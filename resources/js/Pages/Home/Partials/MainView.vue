<template>
    <div
        class="relative flex w-full max-w-[1440px] content-center justify-center"
    >
        <img class="h-[781px] w-[1281px] rounded-lg" :src="asset('')" />
        <div class="absolute left-[88px] top-[690px] w-[1100px]">
            <div class="flex flex-row justify-between">
                <div
                    class="flex w-[350px] flex-col content-center justify-center"
                >
                    <img :src="asset('')" />
                    <div class="text-[36px] leading-[44px] text-[#F0F0F0]">
                        點心
                    </div>
                </div>
                <div
                    class="flex w-[350px] flex-col content-center justify-center"
                >
                    <img :src="asset('')" />
                    <div class="text-[36px] leading-[44px] text-[#F0F0F0]">
                        蛋糕
                    </div>
                </div>
                <div
                    class="flex w-[350px] flex-col content-center justify-center"
                >
                    <img :src="asset('')" />
                    <div class="text-[36px] leading-[44px] text-[#F0F0F0]">
                        飲料
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import asset from "@/asset";
</script>
