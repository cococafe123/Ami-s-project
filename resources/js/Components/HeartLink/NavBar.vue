<template>
    <div class="flex w-full flex-row justify-between px-8 py-6">
        <div class="flex flex-row content-center gap-4">
            <img :src="asset('HeartLink/Logo.svg')" />
            <div class="self-center text-5xl text-[#E2E2E2]">HeartLink</div>
        </div>
        <div class="hidden flex-row gap-6 text-[#E2E2E2] md:flex">
            <button class="self-center">產品介紹</button>
            <button class="self-center">了解 HeartLink</button>
            <button class="self-center">新聞消息</button>
        </div>
        <button
            class="z-20 flex size-6 flex-col justify-around self-center md:hidden"
            @click="toggleMenu"
        >
            <transition name="menu-icon" mode="out-in">
                <img
                    v-if="!isMenuOpen"
                    :src="asset('HeartLink/element-menu.svg')"
                />
            </transition>
            <transition name="menu-icon" mode="out-in">
                <img
                    v-if="isMenuOpen"
                    :src="asset('HeartLink/element-menu-open.svg')"
            /></transition>
        </button>
        <Transition name="menu-content">
            <div
                v-if="isMenuOpen"
                class="100 fixed right-0 top-0 z-10 h-screen w-screen bg-white opacity-90"
            >
                <div class="flex flex-col gap-8 pt-[160px]">
                    <!-- <Link :href="route('home')" class="self-center"
                        >產品介紹</Link
                    >
                    <Link :href="route('shop')" class="self-center"
                        >了解 HeartLink</Link
                    >
                    <Link :href="route('about')" class="self-center"
                        >新聞消息</Link
                    > -->
                    <button class="self-center">產品介紹</button>
                    <button class="self-center">了解 HeartLink</button>
                    <button class="self-center">新聞消息</button>
                </div>
            </div>
        </Transition>
    </div>
</template>

<script lang="ts" setup>
import { Link } from "@inertiajs/vue3";
import { ref } from "vue";
import asset from "@/asset";

const isMenuOpen = ref(false);

const toggleMenu = () => {
    isMenuOpen.value = !isMenuOpen.value;
};
</script>

<style scoped lang="scss">
@keyframes icon-fadeIn {
    0% {
        display: none;
        opacity: 0;
        transform: scale(0.9);
    }
    50% {
        opacity: 0;
        display: none;
        transform: scale(0.9);
    }
    100% {
        opacity: 1;
        transform: scale(1);
    }
}

@keyframes icon-fadeOut {
    0% {
        opacity: 1;
        transform: scale(1);
    }
    50% {
        display: none;
        opacity: 0;
        transform: scale(0.9);
    }
    100% {
        display: none;
        opacity: 0;
        transform: scale(0.9);
    }
}

.menu-icon-enter-active {
    animation: icon-fadeIn 0.5s ease;
}
.menu-icon-leave-active {
    animation: icon-fadeOut 0.5s ease;
}

@keyframes content-fade {
    0% {
        width: 0;
    }
    100% {
        width: 100vw;
    }
}

.menu-content-enter-active {
    animation: content-fade 0.5s ease;
}

.menu-content-leave-active {
    animation: content-fade 0.5s ease reverse;
}
</style>
