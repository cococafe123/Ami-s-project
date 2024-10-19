<template>
    <div ref="scrollContainer" class="flex w-full flex-row justify-around">
        <div
            v-for="(item, index) in cardColNum"
            class="flex flex-col gap-6"
            :class="{
                'items-center': cardColInfo.length === 1,
                'items-start': cardColInfo.length !== 1,
            }"
        >
            <BusinessCard
                v-for="card in cardColInfo[index].card"
                :card="card"
                :flex="false"
                :manage="manage"
                @deleteCard="changeCardContent"
            />
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ref, onMounted, onBeforeUnmount, watch } from "vue";
import { cardType } from "@/Interface/Card";
import { getCardIndex } from "@/api";

// import BusinessCard from "./BusinessCard.vue";

interface col {
    num: Number;
    height: Number;
    card: Array<cardType>;
}

interface propsType {
    manage: Boolean;
}

const props = defineProps<propsType>();
const scrollContainer = ref(null);

const card = ref([]);

const cardColNum = ref(0);
const cardColInfo = ref([]);

let currentCardIndex = 0;

const getLock = ref(true);

const checkSize = () => {
    let width = window.innerWidth;
    if (width >= 1440) {
        cardColNum.value = 4;
    } else if (width >= 880) {
        cardColNum.value = 3;
    } else if (width >= 600) {
        cardColNum.value = 2;
    } else {
        cardColNum.value = 1;
    }
    for (let i = 0; i < cardColNum.value; i++) {
        const newCol: col = { num: 0, height: 0, card: [] };
        cardColInfo.value.push(newCol);
    }
};

const GetCardIndex = async () => {
    try {
        const body = { index: card.value.length, get: 20 };
        console.log(body);
        const res = await getCardIndex(body);

        if (res.status === 200) {
            res.data.cards.forEach((element: cardType) => {
                card.value.push(element);
            });
            console.log("get", res.data);
            reRenderCard();
        }
    } catch (err) {
        console.log(err, "getIndexError");
    }
};

const reRenderCard = () => {
    const getNextIndex = (): number => {
        let index = 0;
        let minHeight = cardColInfo.value[index].height;
        for (let i = 1; i < cardColInfo.value.length; i++) {
            if (minHeight > cardColInfo.value[i].height) {
                index = i;
                minHeight = cardColInfo.value[index].height;
            }
        }
        return index;
    };

    for (let i = 0; i < 20; i++) {
        if (currentCardIndex >= card.value.length) {
            return;
        }

        let index = getNextIndex();

        cardColInfo.value[index].card.push(card.value[currentCardIndex]);

        cardColInfo.value[index].height += card.value[currentCardIndex].height;
        cardColInfo.value[index].height += 24;

        currentCardIndex++;
    }
    getLock.value = false;
};

const handleScroll = () => {
    if (
        window.innerHeight * 0.85 >
            scrollContainer.value.getBoundingClientRect().bottom &&
        !getLock.value
    ) {
        getLock.value = true;
        GetCardIndex();
    }
};

const changeCardContent = () => {
    card.value = [];
    currentCardIndex = 0;
    cardColInfo.value = [];
    checkSize();
    GetCardIndex();
};

defineExpose({
    changeCardContent,
});

const init = () => {
    //先確認寬度可以塞多少
    checkSize();
    //先拿一筆假資料
    GetCardIndex();
};

init();

onMounted(() => {
    window.addEventListener("scroll", handleScroll);
});

onBeforeUnmount(() => {
    window.removeEventListener("scroll", handleScroll);
});
</script>
