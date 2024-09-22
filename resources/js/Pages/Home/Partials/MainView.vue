<template>
    <div class="relative flex h-[1150px] w-full max-w-[1440px] justify-center">
        <img
            class="h-full max-h-[781px] w-full max-w-[1281px] rounded-lg object-cover"
            :src="asset('home-main-view.jpg')"
        />
        <div
            class="main-content-padding absolute top-[130px] flex w-full flex-row content-center justify-between gap-16"
        >
            <div class="flex max-w-[576px] flex-col gap-3">
                <div
                    class="text-pretty text-[52px] font-bold leading-[65px] text-[#B88E2F]"
                >
                    讓味蕾跳舞每一口
                </div>
                <div class="text-pretty text-lg font-medium text-[#333333]">
                    想在重要的節日給對方一個驚喜嗎？我們的客製化蛋糕服務，讓您輕鬆打造獨一無二的甜蜜禮物。
                </div>
            </div>
            <button
                class="h-[80px] self-center rounded-lg bg-[#B88E2F] px-[72px] text-2xl font-bold text-white"
            >
                立即預定
            </button>
        </div>
        <div
            class="transparent-scrollbar absolute bottom-0 flex w-screen max-w-[1280px] overflow-x-auto"
        >
            <div
                class="mx-auto flex min-w-[1100px] flex-row gap-6 justify-self-center"
            >
                <Link
                    class="relative flex w-[350px] flex-col content-center justify-center"
                    :href="route('shop')"
                >
                    <img
                        class="rounded-3xl"
                        :src="asset('home-sub-view1.jpg')"
                    />
                    <div
                        class="absolute w-full text-center text-[36px] leading-[44px] text-[#F0F0F0]"
                    >
                        點心
                    </div>
                </Link>
                <Link
                    class="relative flex w-[350px] flex-col content-center justify-center"
                    :href="route('shop')"
                >
                    <img
                        class="rounded-3xl"
                        :src="asset('home-sub-view2.jpg')"
                    />
                    <div
                        class="absolute w-full text-center text-[36px] leading-[44px] text-[#F0F0F0]"
                    >
                        蛋糕
                    </div>
                </Link>
                <Link
                    class="relative flex w-[350px] flex-col content-center justify-center"
                    :href="route('shop')"
                >
                    <img
                        class="rounded-3xl"
                        :src="asset('home-sub-view3.jpg')"
                    />
                    <div
                        class="absolute w-full text-center text-[36px] leading-[44px] text-[#F0F0F0]"
                    >
                        飲料
                    </div>
                </Link>
            </div>
        </div>
    </div>
</template>

<script lang="ts" setup>
import asset from "@/asset";
import { Link } from "@inertiajs/vue3";
</script>

<style lang="scss" scoped>
.main-content-padding {
    padding-right: min(280px, 15vw);
    padding-left: min(280px, 15vw);
}

.transparent-scrollbar::-webkit-scrollbar {
    width: 8px; /* Adjust width as needed */
}
</style>
