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
        <label
            for="add-card-img-input"
            class="button-shadow mb-6 block w-full rounded-lg border border-[#D9D9D9] bg-[#F7F9FF] px-3 py-3"
            type="button"
        >
            <div class="flex w-full flex-row justify-center gap-2">
                <Plus class="size-4" />
                <div class="text-sm text-[#5a5a5a]">新增你的名片</div>
            </div>
        </label>
        <input
            ref="imgInput"
            class="hidden"
            type="file"
            id="add-card-img-input"
            accept="image/png, image/jpeg, image/gif"
            @change="submit"
        />
        <div class="flex w-full flex-row justify-around">
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
                />
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ref, render, h, onMounted, onUpdated } from "vue";
import { Plus } from "lucide-vue-next";
import { useForm } from "@inertiajs/vue3";

import asset from "@/asset";
import BusinessCard from "@/Components/BusinessCard.vue";
import { cardType } from "@/Interface/Card";

interface col {
    num: Number;
    height: Number;
    card: Array<cardType>;
}

interface propsType {
    card: Array<cardType>;
}

const props = defineProps<propsType>();

const form = useForm({
    img: "",
});

const imgInput = ref(null);
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
        const newCol: col = { num: 0, height: 0, card: [] };
        cardColInfo.value.push(newCol);
    }
};

let currentCardIndex = 0;

const submit = () => {
    var files = imgInput.value.files;
    form.img = files[0];
    form.post(route("card.store"), {
        onSuccess: () => {
            form.reset();
        },
        errorBag: "addCard",
    });
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

    for (let i = 0; i < 24; i++) {
        // const cloneTestCard = Math.floor(Math.random() * 2)
        //     ? testCard1
        //     : testCard2;

        if (currentCardIndex >= props.card.length) {
            break;
        }

        let index = getNextIndex();

        cardColInfo.value[index].card.push(props.card[currentCardIndex]);

        cardColInfo.value[index].height += props.card[currentCardIndex].height;
        cardColInfo.value[index].height += 24;

        currentCardIndex++;
    }
};

onUpdated(() => {
    reRenderCard();
});

const init = () => {
    //先確認寬度可以塞多少
    checkSize();
    //先拿一筆假資料
    reRenderCard();
};

init();

setTimeout(() => {
    // getCard();
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
