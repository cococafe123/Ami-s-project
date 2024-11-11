<template>
    <div class="min-w-screen flex min-h-screen content-center justify-evenly">
        <div class="flex h-[100vh] w-[50vw] flex-col">
            <div class="relative h-[80vh] rounded-xl border border-gray-500">
                <TextBlock
                    :ref="putRef"
                    v-for="(text, index) in textBlock"
                    :class="`z-${allZIndex[index]}`"
                >
                    test button
                </TextBlock>
            </div>
            <div
                class="flex flex-1 flex-row content-center gap-8 rounded-xl border border-gray-500 px-8"
            >
                <button class="border" @click="textBlock++">新增文字</button>
                <button class="border">貼圖</button>
                <button class="border">圖層</button>
            </div>
        </div>
        <div class="flex h-[100vh] w-[30vw] flex-col">
            <div
                class="relative flex h-[100vh] flex-col gap-4 rounded-xl border border-gray-500 py-4"
            >
                <div
                    v-for="(item, index) in allRef"
                    class="flex w-full flex-row items-center justify-around border border-black"
                >
                    <div>{{ index + 1 }}</div>
                    <button class="size-8" @click="upZ(index)">上</button>
                    <button class="size-8" @click="downZ(index)">下</button>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { computed, ref } from "vue";
import { indexOf } from "lodash";

import TextBlock from "./Partial/TextBlock.vue";

const textBlock = ref(0);

const allRef = ref([]);

const allZIndex = ref([]);

const putRef = (el: any) => {
    if (!allRef.value.includes(el)) {
        allRef.value.push(el);
        allZIndex.value.push((allRef.value.length - 1) * 10);
    }
    console.log(allZIndex.value);
};

const upZ = (index: number) => {
    if (allZIndex.value[index] < 10 * allRef.value.length) {
        const findIndex = indexOf(allZIndex.value, allZIndex.value[index] + 10);
        allZIndex.value[findIndex] = allZIndex.value[index];
        allZIndex.value[index] += 10;
    }
};

const downZ = (index: number) => {
    if (allZIndex.value[index] > 0) {
        const findIndex = indexOf(allZIndex.value, allZIndex.value[index] - 10);
        console.log(allZIndex.value[index]);
        allZIndex.value[findIndex] = allZIndex.value[index];
        allZIndex.value[index] -= 10;
    }
};
</script>
