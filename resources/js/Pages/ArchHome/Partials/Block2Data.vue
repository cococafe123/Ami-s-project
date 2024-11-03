<template>
    <div
        class="padding-content flex flex-col content-center gap-6 rounded-t-[80px] bg-white px-4 pt-[80px] sm:px-8 md:flex-row md:justify-between"
    >
        <div
            class="flex w-[350px] flex-col content-center gap-8 rounded-3xl border border-[#D9D9D9] bg-[#f5f5f5] py-8"
        >
            <div class="text-center text-5xl font-bold text-[#1D91D7]">
                {{ client }}+
            </div>
            <div class="text-center text-base font-semibold text-[#27272c]">
                客戶數
            </div>
        </div>

        <div
            class="flex w-[350px] flex-col content-center gap-8 rounded-3xl border border-[#D9D9D9] bg-[#f5f5f5] py-8"
        >
            <div class="text-center text-5xl font-bold text-[#1D91D7]">
                {{ keyword }}+
            </div>
            <div class="text-center text-base font-semibold text-[#27272c]">
                客戶Google關鍵字排名第一頁總量
            </div>
        </div>

        <div
            class="flex w-[350px] flex-col content-center gap-8 rounded-3xl border border-[#D9D9D9] bg-[#f5f5f5] py-8"
        >
            <div class="text-center text-5xl font-bold text-[#1D91D7]">
                {{ searchGoogleClient }}+
            </div>
            <div class="text-center text-base font-semibold text-[#27272c]">
                客戶 Google 自然總流量
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ref } from "vue";

const client = ref(1000);
const keyword = ref(10000);
const searchGoogleClient = ref("1000萬");
</script>
