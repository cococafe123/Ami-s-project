<template>
    <div class="min-w-screen flex min-h-screen content-center justify-evenly">
        <div class="flex h-[100vh] w-[50vw] flex-col">
            <div
                ref="outFrameRef"
                class="relative h-[80vh] rounded-xl border border-gray-500"
            >
                <v-stage ref="stageRef" :config="frameSize">
                    <v-layer>
                        <div v-for="(item, index) in textBlock">
                            <TextBlock
                                v-if="allType[index] === 'text'"
                                :ref="pushRef"
                                @delete-node="deleteTextNode(item, index)"
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
</template>
<script lang="ts" setup>
import { ref, onMounted, provide, inject } from "vue";

import TextBlock from "./Partial/TextBlock.vue";

const textBlock = ref<string[]>([]);

const outFrameRef = ref(null);

const frameSize = ref({ width: 0, height: 0 });

const stageRef = ref(null);

const allRef = ref([]);
const allType = ref([]);

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
    textBlock.value.push("text");
    allType.value.push("text");
};

const deleteTextNode = (item: any, index: number) => {
    textBlock.value.splice(item, 1);
    allType.value.splice(index, 1);
    console.log("delete emit");

    console.log(textBlock.value, allType.value);
};

const init = () => {
    getFrameSize();
};

init();

provide("stageRef", stageRef);
provide("outFrameRef", outFrameRef.value);
</script>
