<template>
    <div
        class="flex w-full max-w-[1440px] flex-row justify-between p-8 xl:px-[170px]"
    >
        <Transition name="logo">
            <div v-if="!isSearchOpen" class="flex flex-col gap-1.5">
                <div class="text-[32px] font-semibold leading-9 text-[#444444]">
                    CardCity
                </div>
                <div class="text-sm font-semibold text-[#757575]">
                    上傳、分享你的名片
                </div>
            </div>
        </Transition>
        <!-- normal search -->
        <div
            class="relative hidden h-[56px] w-[240px] max-w-sm items-center sm:block"
        >
            <Input
                id="search"
                type="text"
                placeholder="搜尋卡片 ID"
                class="h-[56px] rounded-full pl-10"
            />
            <span
                class="absolute inset-y-0 start-0 flex items-center justify-center px-2"
            >
                <Search class="size-6" />
            </span>
        </div>

        <!-- mobile search -->
        <button
            class="z-20 flex size-14 content-center justify-center rounded-full border border-[#757575] sm:hidden"
            @click="isSearchOpen = !isSearchOpen"
        >
            <Search v-show="!isSearchOpen" class="size-6" />
            <X v-show="isSearchOpen" class="size-6" />
        </button>

        <!-- <Transition name="menu-content">
            <div
                v-if="isSearchOpen"
                class="100 fixed right-0 top-0 z-10 h-screen w-screen bg-white opacity-90"
            >
                <div class="flex flex-col gap-8 pt-[160px] px-10">
                    <Input
                        type="text"
                        placeholder="搜尋卡片 ID"
                        class="h-[56px] rounded-full"
                    />
                </div>
            </div>
        </Transition> -->
    </div>
</template>
<script lang="ts" setup>
import { Popover, PopoverTrigger, PopoverContent } from "./ui/popover";
import { Input } from "./ui/input";
import { Search, X } from "lucide-vue-next";
import { ref } from "vue";

import asset from "@/asset";

const isSearchOpen = ref(false);
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

@keyframes fade-in {
    0% {
        opacity: 0;
    }
    100% {
        opacity: 1;
    }
}

.logo-enter-active {
    animation: fade-in 0.5s ease;
}

.logo-leave-active {
    animation: fade-in 0.5s ease reverse;
}

@keyframes search-fade-in {
    0% {
        width: 56px;
    }
    100% {
        width: 100%;
    }
}
</style>
