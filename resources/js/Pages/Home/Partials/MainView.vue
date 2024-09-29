<template>
    <div class="w-full px-8 pb-16 xl:px-[170px]">
        <div class="flex flex-row gap-1">
            <img :src="asset('element-tv.svg')" />
            <div
                class="items-center text-[11px] font-normal leading-4 text-[#757575]"
            >
                共{{ totalCardNum }}張名片
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import asset from "@/asset";
import { ref, render, h, onMounted } from "vue";

// const testNode = ref(null);

// onMounted(() => {
//     const newVNode = h(
//         "div",
//         { class: "dynamic-element" },
//         "這是用 h 函式生成的元素"
//     );

//     render(newVNode, testNode.value);
// });

const totalCardNum = ref(2400);

const cardColNum = ref(0);

const checkSize = () => {
    let width = window.innerWidth;
    if (width >= 1440) {
        cardColNum.value = 4;
    } else if (width >= 880) {
        cardColNum.value = 3;
    } else if (width >= 600) {
        cardColNum.value = 2;
    }
};
</script>
