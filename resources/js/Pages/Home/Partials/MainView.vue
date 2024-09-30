<template>
    <div class="w-full px-8 pb-6 sm:pb-16 xl:px-[170px]">
        <div class="flex flex-row gap-1 py-2">
            <img :src="asset('element-tv.svg')" />
            <div
                class="items-center text-[11px] font-normal leading-4 text-[#757575]"
            >
                共{{ totalCardNum }}張名片
            </div>
        </div>
        <div class="flex w-full flex-row justify-around">
            <div
                v-for="(item, index) in cardColNum"
                class="flex flex-col gap-6"
            >
                <BusinessCard
                    v-for="card in cardColInfo[index].card"
                    :card="card"
                />
            </div>
        </div>
        <button
            class="button-shadow fixed bottom-12 right-6 rounded-full border border-[#E2E8F0] bg-[#F7F9FF] px-3 py-3"
        >
            <Plus class="size-4" />
        </button>
    </div>
</template>
<script lang="ts" setup>
import { ref, render, h, onMounted } from "vue";
import { Plus } from "lucide-vue-next";

import asset from "@/asset";
import BusinessCard from "@/Components/BusinessCard.vue";

interface card {
    img: String;
    type: String;
    like: Number;
    qrcode: String;
    url: String;
}

interface col {
    num: Number;
    pass: Boolean;
    card: Array<card>;
}

const props = defineProps({});

const totalCardNum = ref(2400);
const cardColNum = ref(0);
const cardColInfo = ref([]);

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
        const newCol: col = { num: 0, pass: false, card: [] };
        cardColInfo.value.push(newCol);
    }
};

const testCard1: card = {
    img: "testImg1.png",
    type: "normal",
    like: 104,
    url: "",
    qrcode: "",
};
const testCard2: card = {
    img: "testImg2.png",
    type: "high",
    like: 123,
    url: "",
    qrcode: "",
};

let currentIndex = 0;

const getCard = () => {
    const getNextIndex = (): number => {
        const nextIndex = () => {
            currentIndex += 1;
            if (currentIndex >= cardColInfo.value.length) {
                currentIndex = 0;
            }
        };
        //找下個
        nextIndex();
        //假設高度太高先跳過再找下個
        while (cardColInfo.value[currentIndex].pass) {
            console.log("true");
            cardColInfo.value[currentIndex].pass = false;
            nextIndex();
        }
        return currentIndex;
    };
    //一次拿12張名片

    for (let i = 0; i < 12; i++) {
        const cloneTestCard = Math.floor(Math.random() * 2)
            ? testCard1
            : testCard2;
        cardColInfo.value[getNextIndex()].card.push(cloneTestCard);
        if (cloneTestCard.type !== "normal") {
            cardColInfo.value[currentIndex].pass = true;
        }
    }
};

const init = () => {
    //先確認寬度可以塞多少
    checkSize();
    //先拿一筆假資料
    getCard();
};

init();

setTimeout(() => {
    getCard();
}, 5000);
</script>
<style lang="scss" scoped>
.button-shadow {
    box-shadow: var(--sds-size-depth-0) var(--sds-size-depth-100)
        var(--sds-size-depth-100) var(--sds-size-depth-negative-100)
        var(--sds-color-black-100);

    box-shadow: var(--sds-size-depth-0) var(--sds-size-depth-400)
        var(--sds-size-depth-800) var(--sds-size-depth-negative-100)
        var(--sds-color-black-200);
}
</style>
