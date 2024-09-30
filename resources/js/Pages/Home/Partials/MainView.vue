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
        <button class=""></button>
        <label
            for="add-card-img-input"
            class="button-shadow fixed bottom-12 right-6 rounded-full border border-[#E2E8F0] bg-[#F7F9FF] px-3 py-3"
            type="button"
        >
            <Plus class="size-4" />
        </label>
        <input
            ref="imgInput"
            class="hidden"
            type="file"
            id="add-card-img-input"
            accept="image/png, image/jpeg, image/gif"
            @change="submit"
        />
    </div>
</template>
<script lang="ts" setup>
import { ref, render, h, onMounted } from "vue";
import { Plus } from "lucide-vue-next";
import { useForm } from "@inertiajs/vue3";

import asset from "@/asset";
import BusinessCard from "@/Components/BusinessCard.vue";

interface card {
    img: String;
    like: Number;
    QRCode: String;
    id: String;
}

interface col {
    num: Number;
    pass: Boolean;
    card: Array<card>;
}

interface propsType {
    card: Array<card>;
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
        const newCol: col = { num: 0, pass: false, card: [] };
        cardColInfo.value.push(newCol);
    }
};

const testCard1: card = {
    img: "testImg1.png",
    like: 104,
    QRCode: "",
    id: "1",
};
const testCard2: card = {
    img: "testImg2.png",
    like: 123,
    QRCode: "",
    id: "2",
};

let currentColIndex = -1;
let currentCardIndex = 0;

const getCard = () => {
    const getNextIndex = (): number => {
        currentColIndex += 1;
        if (currentColIndex >= cardColInfo.value.length) {
            currentColIndex = 0;
        }
        return currentColIndex;
    };
    //一次拿12張名片

    for (let i = 0; i < 12; i++) {
        // const cloneTestCard = Math.floor(Math.random() * 2)
        //     ? testCard1
        //     : testCard2;

        if (currentCardIndex >= props.card.length) {
            break;
        }

        cardColInfo.value[getNextIndex()].card.push(
            props.card[currentCardIndex],
        );
        currentCardIndex++;
    }
};

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

const init = () => {
    //先確認寬度可以塞多少
    checkSize();
    //先拿一筆假資料
    getCard();
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
