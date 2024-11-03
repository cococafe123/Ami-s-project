<template>
    <div class="min-w-screen flex min-h-screen content-center justify-center">
        <div class="flex h-[100vh] w-[50vw] flex-col">
            <div class="relative h-[80vh] rounded-xl border border-gray-500">
                <TextBlock v-for="(text, index) in textBlock">
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
    </div>
</template>
<script lang="ts" setup>
import { computed, ref } from "vue";
import TextBlock from "./Partial/TextBlock.vue";

const textBlock = ref(0);

const allRef = ref([]);
</script>
