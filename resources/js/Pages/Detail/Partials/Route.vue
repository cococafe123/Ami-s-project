<template>
    <div
        class="flex w-full max-w-[1440px] flex-row gap-3 bg-[#F9F1E7] px-[100px] py-9"
    >
        <Link :href="route('home')" class="self-center text-[#9F9F9F]">
            首頁
        </Link>
        <img :src="asset('element-right-arrow.svg')" />
        <Link :href="route('shop')" class="self-center text-[#9F9F9F]">
            商店
        </Link>
        <img :src="asset('element-right-arrow.svg')" />
        <div class="h-8 w-[2px] bg-[#9F9F9F]"></div>
        <Link
            :href="route('detail', { id: 1 })"
            class="self-center text-[#3A3A3A]"
        >
            藍莓香草蛋糕
        </Link>
    </div>
</template>
<script lang="ts" setup>
import { Link } from "@inertiajs/vue3";
import asset from "@/asset";
</script>
