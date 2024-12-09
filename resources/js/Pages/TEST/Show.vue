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
                                @copy-dom="copyTextBlock(index)"
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
                        @click="addTextBlock()"
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

                    <Drawer>
                        <DrawerTrigger>
                            <button class="h-12 w-full rounded border p-2">
                                圖層
                            </button>
                        </DrawerTrigger>
                        <DrawerContent>
                            <div class="mx-auto w-full max-w-sm">
                                <DrawerHeader>
                                    <DrawerTitle>移動圖層</DrawerTitle>
                                    <DrawerDescription
                                        >自由移動你所選的</DrawerDescription
                                    >
                                </DrawerHeader>
                                <ScrollArea
                                    class="h-[250px] w-full rounded border border-gray-400 p-2"
                                >
                                    <div
                                        v-for="(z, index) in allZindex"
                                        class="w-full"
                                    >
                                        <div
                                            class="flex flex-row justify-between gap-8 px-4 py-2"
                                        >
                                            <div
                                                class="flex flex-row items-center gap-4"
                                            >
                                                <div>{{ z }}</div>
                                                <div>{{ allType[z] }}</div>
                                            </div>
                                            <div class="flex flex-row gap-2">
                                                <button
                                                    class="size-8"
                                                    :class="{
                                                        'opacity-50':
                                                            index === 0,
                                                    }"
                                                    :disabled="index === 0"
                                                    @click="
                                                        changeZindexUp(index)
                                                    "
                                                >
                                                    <img
                                                        :src="
                                                            asset(
                                                                'test/element-arrow-up.svg',
                                                            )
                                                        "
                                                    />
                                                </button>
                                                <button
                                                    class="size-8"
                                                    :class="{
                                                        'opacity-50':
                                                            index ===
                                                            allZindex.length -
                                                                1,
                                                    }"
                                                    :disabled="
                                                        index ===
                                                        allZindex.length - 1
                                                    "
                                                    @click="
                                                        changeZindexDown(index)
                                                    "
                                                >
                                                    <img
                                                        :src="
                                                            asset(
                                                                'test/element-arrow-down.svg',
                                                            )
                                                        "
                                                    />
                                                </button>
                                            </div>
                                        </div>
                                        <Separator
                                            v-if="index !== allZindex.length"
                                        />
                                    </div>
                                </ScrollArea>
                                <DrawerFooter>
                                    <DrawerClose>
                                        <button
                                            class="h-12 w-full rounded border p-2"
                                        >
                                            離開
                                        </button>
                                    </DrawerClose>
                                </DrawerFooter>
                            </div>
                        </DrawerContent>
                    </Drawer>
                </div>
                <!-- <button class="border">貼圖</button>
                <button class="border" @click="">測試按鍵</button> -->
                <div v-if="clickOnText" class="flex w-[300px] flex-col gap-2">
                    <div class="flex w-[300px] flex-row items-center gap-4">
                        <div class="w-[100px]">字型</div>
                        <Select
                            @update:modelValue="
                                (value: string) => {
                                    allConfig[clickOnIndex].fontFamily = value;
                                }
                            "
                        >
                            <SelectTrigger class="w-full">
                                <SelectValue
                                    :placeholder="selectTextFontType"
                                />
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
                    </div>
                    <div class="flex w-[300px] flex-row items-center gap-4">
                        <div class="w-[100px]">字體顏色</div>
                        <Select
                            @update:modelValue="
                                (value: string) => {
                                    allConfig[clickOnIndex].fill = value;
                                }
                            "
                        >
                            <SelectTrigger class="w-full">
                                <SelectValue
                                    :placeholder="selectTextColorType"
                                />
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
import {
    Drawer,
    DrawerClose,
    DrawerContent,
    DrawerDescription,
    DrawerFooter,
    DrawerHeader,
    DrawerTitle,
    DrawerTrigger,
} from "@/Components/ui/drawer";

import { ScrollArea } from "@/Components/ui/scroll-area";
import { Separator } from "@/Components/ui/separator";
import { cloneDeep } from "lodash";

import TextBlock from "./Partials/TextBlock.vue";
import ImageBlock from "./Partials/ImageBlock.vue";
import asset from "@/asset";

const outFrameRef = ref(null);

const frameSize = ref({ width: 0, height: 0 });

const stageRef = ref(null);

const allType = ref([]);
const allConfig = ref([]);
const allZindex = ref([]);

const clickOnText = ref(false);
const clickOnIndex = ref();
const selectTextFontType = computed(() => {
    return clickOnText.value &&
        allConfig.value[clickOnIndex.value].fontFamily !== null
        ? allConfig.value[clickOnIndex.value].fontFamily
        : "Select a font";
});

const selectTextColorType = computed(() => {
    return clickOnText.value &&
        allConfig.value[clickOnIndex.value].fill !== null
        ? allConfig.value[clickOnIndex.value].fill
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
    allZindex.value.push(allType.value.length);
    allType.value.push("text");
    allConfig.value.push({
        fontFamily: "arial",
        zIndex: allType.value.length + 1,
        fill: "black",
        x: 50,
        y: 50,
        text: "test",
        fontSize: 24,
        draggable: true,
    });
};

const copyTextBlock = (index: number) => {
    allZindex.value.push(allType.value.length);
    allType.value.push("text");
    allConfig.value.push(cloneDeep(allConfig.value[index]));
    let config = allConfig.value[allConfig.value.length - 1];
    config.x = config.x + 20;
    config.y = config.y + 20;
};

const deleteNode = (index: any) => {
    allType.value[index] = null;
    allZindex.value = allZindex.value.filter((element) => element != index);
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
            allZindex.value.push(allType.value.length);
            allType.value.push("image");
            allConfig.value.push({
                mainImage: mainImage,
                width: 100,
                height: height / (width / 100),
                index: allType.value.length + 1,
            });
        };
    }
};

const changeZindexUp = (index: number) => {
    const idx1 = cloneDeep(allConfig.value[allZindex.value[index]].index);
    const idx2 = cloneDeep(allConfig.value[allZindex.value[index - 1]].index);

    console.log(idx1, idx2);

    allConfig.value[allZindex.value[index]].index = cloneDeep(idx2);
    allConfig.value[allZindex.value[index - 1]].index = cloneDeep(idx1);

    console.log(
        allConfig.value[allZindex.value[index]].index,
        allConfig.value[allZindex.value[index - 1]].index,
    );

    [allZindex.value[index], allZindex.value[index - 1]] = [
        allZindex.value[index - 1],
        allZindex.value[index],
    ];
};

const changeZindexDown = (index: number) => {
    const idx1 = allZindex.value[index];
    const idx2 = allZindex.value[index + 1];

    [allConfig.value[idx1].index, allConfig.value[idx2].index] = [
        allConfig.value[idx2].index,
        allConfig.value[idx1].index,
    ];

    [allZindex.value[index], allZindex.value[index + 1]] = [
        allZindex.value[index + 1],
        allZindex.value[index],
    ];

    console.log(
        allConfig.value[allZindex.value[index]].index,
        allConfig.value[allZindex.value[index + 1]].index,
    );
};

const init = () => {
    getFrameSize();
};

init();

provide("stageRef", stageRef);
provide("outFrameRef", outFrameRef.value);
</script>
