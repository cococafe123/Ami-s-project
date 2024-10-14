<template>
    <div
        v-if="current"
        class="flex size-full flex-row justify-around gap-8 px-8 pb-6 pt-8 sm:pb-16 xl:px-[170px]"
    >
        <div
            class="flex w-[65%] min-w-[330px] flex-col items-center gap-2 sm:items-start"
        >
            <BusinessCard
                :card="current"
                :flex="true"
                :manage="false"
                class=""
            />
            <div class="px-4 text-xs">Card ID: {{ current.id }}</div>
        </div>
        <div class="flex flex-col gap-7 p-5">
            <Qrcode
                :value="url"
                :image-settings="imageSettings"
                level="H"
                :size="200"
            ></Qrcode>
            <div class="flex flex-row justify-between">
                <div class="flex flex-row items-center">
                    <Like />
                    <div class="pl-2 text-sm">{{ current.like }}</div>
                </div>
                <Transition name="fade">
                    <button
                        v-if="isNoneCopyClick"
                        class="flex flex-row items-center"
                        @click="copyUrlClick"
                    >
                        <Link class="size-4" />
                        <div class="pl-2 text-sm">複製連結</div>
                    </button></Transition
                ><Transition name="fade">
                    <div
                        v-if="isAlreadyCopyClick"
                        class="flex flex-row items-center"
                    >
                        <Check class="text-[#009951]" />
                        <div class="pl-2 text-sm text-[#009951]">複製完成</div>
                    </div>
                </Transition>
            </div>
        </div>

        <BusinessCardIndex ref="cardIndex" :manage="false" />
    </div>

    <div v-else class="w-full px-8 pb-6 pt-8 sm:pb-16 xl:px-[170px]">
        <div class="flex flex-col sm:hidden">
            <div class="flex flex-col items-start pt-16">
                <div class="">
                    <div class="text-4xl text-[#e85240]">Oops!</div>
                    <div class="pb-4 text-left text-xl text-[#e85240]">
                        找不到你輸入的名片 ID
                    </div>
                    <LinkUrl :href="route('home')"
                        ><div
                            class="flex h-12 w-[205px] content-center justify-center rounded-lg border border-[#d9d9d9]"
                        >
                            <div class="text-center">返回首頁</div>
                        </div></LinkUrl
                    >
                </div>
            </div>
            <div class="flex flex-col items-end">
                <img :src="asset('element-no-found.svg')" />
            </div>
        </div>
        <div class="hidden flex-row sm:flex">
            <div class="flex w-1/2 flex-col items-center pt-16">
                <div class="">
                    <div class="text-4xl text-[#e85240]">Oops!</div>
                    <div class="pb-4 text-left text-xl text-[#e85240]">
                        找不到你輸入的名片 ID
                    </div>
                    <LinkUrl :href="route('home')"
                        ><div
                            class="flex h-12 w-[205px] content-center justify-center rounded-lg border border-[#d9d9d9]"
                        >
                            <div class="text-center">返回首頁</div>
                        </div></LinkUrl
                    >
                </div>
            </div>
            <div class="flex w-1/2 flex-col items-center">
                <img :src="asset('element-no-found.svg')" />
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ref } from "vue";
import { cardType } from "@/Interface/Card";
import { Link, Check } from "lucide-vue-next";
import { Link as LinkUrl } from "@inertiajs/vue3";

import Like from "@/Components/Like.vue";
import Qrcode from "qrcode.vue";
import asset from "@/asset";
import BusinessCardIndex from "@/Components/BusinessCardIndex.vue";

interface propsType {
    current: cardType;
}

const props = defineProps<propsType>();

const imageSettings = ref({
    src: asset("logo-test.svg"),
    width: 30,
    height: 30,
    excavate: true,
});

const isNoneCopyClick = ref(true);
const isAlreadyCopyClick = ref(false);
const url = ref(window.location.href);

const copyUrlClick = () => {
    const toggleNoneFalse = () => {
        isNoneCopyClick.value = false;
        setTimeout(() => {
            toggleAlreadyTrue();
        }, 100);
    };

    const toggleNoneTrue = () => {
        isNoneCopyClick.value = true;
    };
    const toggleAlreadyFalse = () => {
        isAlreadyCopyClick.value = false;
        setTimeout(() => {
            toggleNoneTrue();
        }, 100);
    };
    const toggleAlreadyTrue = () => {
        isAlreadyCopyClick.value = true;
        setTimeout(() => {
            toggleAlreadyFalse();
        }, 1800);
    };

    //copy url
    navigator.clipboard.writeText(url.value);

    toggleNoneFalse();
};
</script>

<style scoped lang="scss">
@keyframes fade-out {
    0% {
        opacity: 1;
    }
    100% {
        opacity: 0;
    }
}

.fade-enter-active {
    animation: fade-out 0.1s ease reverse;
}

.fade-leave-active {
    animation: fade-out 0.1s ease;
}
</style>
