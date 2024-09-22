<template>
    <div
        class="flex w-full max-w-[1440px] flex-wrap justify-center gap-4 px-10 py-6 sm:justify-between"
    >
        <div class="flex flex-row gap-3">
            <img :src="asset('Logo.svg')" />
            <div
                class="font-montserrat self-center text-[34px] font-medium text-[#C68C0A]"
            >
                CakeShop
            </div>
        </div>
        <div class="hidden flex-row gap-[79px] md:flex">
            <Link :href="route('home')" class="self-center">首頁</Link>
            <Link :href="route('shop')" class="self-center">商店</Link>
            <Link :href="route('about')" class="self-center">關於我們</Link>
        </div>
        <div class="flex flex-row content-center gap-[45px]">
            <button>
                <img :src="asset('element-account.svg')" />
            </button>
            <button>
                <img :src="asset('element-search.svg')" />
            </button>
            <button>
                <img :src="asset('element-shopping-cart.svg')" />
            </button>
            <button
                class="z-20 flex size-6 flex-col justify-around md:hidden"
                @click="toggleMenu"
            >
                <transition name="menu-icon" mode="out-in">
                    <img v-if="!isMenuOpen" :src="asset('element-menu.svg')" />
                </transition>
                <transition name="menu-icon" mode="out-in">
                    <img
                        v-if="isMenuOpen"
                        :src="asset('element-menu-open.svg')"
                /></transition>
            </button>
        </div>
        <Transition name="menu-content">
            <div
                v-if="isMenuOpen"
                class="100 fixed right-0 top-0 z-10 h-screen w-screen bg-white opacity-90"
            >
                <div class="flex flex-col gap-8 pt-[160px]">
                    <Link :href="route('home')" class="self-center">首頁</Link>
                    <Link :href="route('shop')" class="self-center">商店</Link>
                    <Link :href="route('about')" class="self-center"
                        >關於我們</Link
                    >
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
