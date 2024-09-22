<template>
    <div class="relative w-full">
        <img
            class="h-[316px] w-full object-cover object-center"
            :src="asset('shop-main-view.jpg')"
        />
        <div
            class="absolute left-0 top-0 flex size-full content-center justify-center"
        >
            <div class="flex flex-col">
                <div class="text-center text-[48px] font-medium text-[#3A3A3A]">
                    商店
                </div>
                <div class="flex flex-row gap-2">
                    <Link
                        class="self-center text-base text-[#3A3A3A]"
                        :href="route('home')"
                        >首頁</Link
                    >
                    <img :src="asset('element-right-arrow.svg')" />
                    <Link
                        class="self-center text-base text-[#3A3A3A]"
                        :href="route('shop')"
                        >商店</Link
                    >
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import asset from "@/asset";
import { Link } from "@inertiajs/vue3";
</script>
