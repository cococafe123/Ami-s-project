<template>
    <div class="min-w-screen flex min-h-screen content-center justify-evenly">
        <div class="flex h-[100vh] w-[50vw] flex-col">
            <div
                ref="outFrameRef"
                class="relative h-[80vh] rounded-xl border border-gray-500"
            >
                <v-stage ref="stageRef" :config="frameSize">
                    <v-layer>
                        <div v-for="(item, index) in textBlock" :key="index">
                            <TextBlock
                                v-if="allType[index] === 'text'"
                                :ref="pushRef"
                                @delete-node="deleteTextNode(index)"
                            />
                        </div>
                    </v-layer>
                </v-stage>
            </div>

            <div
                class="flex min-h-[200px] flex-1 flex-row content-center gap-8 rounded-xl border border-gray-500 px-8"
            >
                <button class="border" @click="addTextBlock">新增文字</button>
                <button class="border">貼圖</button>
                <button class="border" @click="">測試按鍵</button>
            </div>
        </div>
    </div>

    <button
        v-for="(item, index) in testBlock"
        @click="testBlock.splice(index, 1)"
        class="pr-6"
    >
        {{ item }}
    </button>
</template>
<script lang="ts" setup>
import { ref, onMounted, provide, inject } from "vue";

import TextBlock from "./Partial/TextBlock.vue";

const textBlock = ref<string[]>([]);

const testBlock = ref<string[]>(["test1", "test2", "test3"]);

const outFrameRef = ref(null);

const frameSize = ref({ width: 0, height: 0 });

const stageRef = ref(null);

const allRef = ref([]);
const allType = ref([]);

let index = 0;

const getFrameSize = () => {
    frameSize.value.width =
        window.innerWidth > 700 ? window.innerWidth * 0.5 : 350;
    frameSize.value.height =
        window.innerHeight > 700 / 0.8 ? window.innerHeight * 0.8 : 700;
};

const pushRef = (el: any) => {
    if (!allRef.value.includes(el)) {
        allRef.value.push(el);
    }
};

const addTextBlock = () => {
    textBlock.value.push("text" + index);
    index++;
    console.log(index);
    allType.value.push("text");
};

const deleteTextNode = (index: number) => {
    console.log(textBlock.value[index]);
    textBlock.value.splice(index, 1);

    allType.value.splice(index, 1);
};

const init = () => {
    getFrameSize();
};

init();

provide("stageRef", stageRef);
provide("outFrameRef", outFrameRef.value);
</script>
