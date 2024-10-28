<template>
    <div class="min-w-screen flex min-h-screen content-center justify-center">
        <div class="flex h-[100vh] w-[50vw] flex-col">
            <div class="relative h-[80vh] rounded-xl border border-gray-500">
                <button
                    v-for="(text, index) in textBlock"
                    class="absolute"
                    :style="textBlockStyle[index]"
                >
                    test button
                </button>
            </div>
            <div
                class="flex flex-1 flex-row content-center gap-8 rounded-xl border border-gray-500 px-8"
            >
                <button class="border" @click="addTextBlock">新增文字</button>
                <button class="border">貼圖</button>
                <button class="border">圖層</button>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { computed, ref } from "vue";
import { cloneDeep } from "lodash";

const textBlock = ref(0);

const nullPosition = ref({ x: "500", y: "500", isDragging: false });

//
const textBlockPosition = ref([]);
const textBlockStyle = computed(() => {
    let styleArray: Array<object> = [];
    console.log(textBlockPosition.value[0].x);

    textBlockPosition.value.forEach((element) => {
        console.log(element.x);

        styleArray.push({
            left: `${element.x}px`,
            top: `${element.y}px`,
            cursor: element.isDragging ? "grabbing" : "grab",
        });
    });
    return styleArray;
});

const allRef = ref([]);

const addTextBlock = () => {
    textBlockPosition.value.push(cloneDeep(nullPosition.value));
    console.log(textBlockPosition.value[0].x);

    textBlock.value++;
    console.log(textBlockStyle);
};
</script>
