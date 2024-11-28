<template>
    <div class="flex min-h-screen min-w-full content-center justify-evenly">
        <div class="flex h-[100vh] w-[50vw] flex-col">
            <div
                ref="outFrameRef"
                class="relative h-[80vh] rounded-xl border border-gray-500"
            >
                <v-stage ref="stageRef" :config="frameSize">
                    <v-layer>
                        <div v-for="(item, index) in allType" :key="index">
                            <TextBlock
                                v-if="allType[index] === 'text'"
                                :config="allConfig[index]"
                                @delete-node="deleteNode(index)"
                                @click-on="
                                    clickOnIndex = index;
                                    clickOnText = true;
                                "
                                @leave="clickOnText = false"
                            />
                            <ImageBlock
                                v-if="allType[index] === 'image'"
                                :config="allConfig[index]"
                                @delete-node="deleteNode(index)"
                                @leave="clickOnText = false"
                            />
                        </div>
                    </v-layer>
                </v-stage>
            </div>

            <div
                class="flex min-h-[200px] flex-1 flex-row items-center gap-8 rounded-xl border border-gray-500 px-8"
            >
                <div class="flex flex-col gap-2">
                    <button
                        class="h-12 rounded border p-2"
                        @click="addTextBlock"
                    >
                        新增文字
                    </button>
                    <label
                        class="flex h-12 items-center justify-center rounded border p-2"
                    >
                        新增圖片
                        <input
                            type="file"
                            accept="image/*"
                            class="hidden"
                            @change="addImage"
                        />
                    </label>
                    <!-- <button class="h-12 rounded border p-2">圖層</button> -->
                </div>
                <!-- <button class="border">貼圖</button>
                <button class="border" @click="">測試按鍵</button> -->
                <div v-if="clickOnText" class="flex w-[200px] flex-col gap-2">
                    <Select
                        @update:modelValue="
                            (value: string) => {
                                allConfig[clickOnIndex].font = value;
                            }
                        "
                    >
                        <SelectTrigger class="w-full">
                            <SelectValue :placeholder="selectTextFontType" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectItem
                                    v-for="font in textFontOptions"
                                    :value="font"
                                >
                                    {{ font }}
                                </SelectItem>
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                    <Select
                        @update:modelValue="
                            (value: string) => {
                                allConfig[clickOnIndex].color = value;
                            }
                        "
                    >
                        <SelectTrigger class="w-full">
                            <SelectValue :placeholder="selectTextColorType" />
                        </SelectTrigger>
                        <SelectContent>
                            <SelectGroup>
                                <SelectItem
                                    v-for="color in textColorOptions"
                                    :value="color"
                                >
                                    {{ color }}
                                </SelectItem>
                            </SelectGroup>
                        </SelectContent>
                    </Select>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ref, onMounted, provide, inject, computed } from "vue";
import {
    Select,
    SelectContent,
    SelectGroup,
    SelectItem,
    SelectLabel,
    SelectTrigger,
    SelectValue,
} from "@/Components/ui/select";

import TextBlock from "./Partial/TextBlock.vue";
import ImageBlock from "./Partial/ImageBlock.vue";

const outFrameRef = ref(null);

const frameSize = ref({ width: 0, height: 0 });

const stageRef = ref(null);

const allType = ref([]);
const allConfig = ref([]);

const clickOnText = ref(false);
const clickOnIndex = ref();
const selectTextFontType = computed(() => {
    return clickOnText.value &&
        allConfig.value[clickOnIndex.value].font !== null
        ? allConfig.value[clickOnIndex.value].font
        : "Select a font";
});

const selectTextColorType = computed(() => {
    return clickOnText.value &&
        allConfig.value[clickOnIndex.value].color !== null
        ? allConfig.value[clickOnIndex.value].color
        : "Select a color";
});

const textFontOptions = ref(["Kavivanar", "arial"]);

const textColorOptions = ref(["red", "black"]);

const getFrameSize = () => {
    frameSize.value.width =
        window.innerWidth > 700 ? window.innerWidth * 0.5 : 350;
    frameSize.value.height =
        window.innerHeight > 700 / 0.8 ? window.innerHeight * 0.8 : 700;
};

// const pushRef = (el: any) => {
//     if (!allRef.value.includes(el)) {
//         allRef.value.push(el);
//     }
// };

const addTextBlock = () => {
    allType.value.push("text");
    allConfig.value.push({ font: "arial", z: "0", color: "black" });
};

const deleteNode = (index: any) => {
    allType.value[index] = null;
};

const addImage = (event: Event) => {
    const file = (event.target as HTMLInputElement).files?.[0];
    if (file) {
        const mainImage = new window.Image();
        const imageUrl = URL.createObjectURL(file);
        mainImage.src = imageUrl;
        mainImage.onload = () => {
            const width = mainImage.width;
            const height = mainImage.height;
            allType.value.push("image");
            allConfig.value.push({
                mainImage: mainImage,
                width: 100,
                height: height / (width / 100),
            });
        };
    }
};

const init = () => {
    getFrameSize();
};

init();

provide("stageRef", stageRef);
provide("outFrameRef", outFrameRef.value);
</script>
