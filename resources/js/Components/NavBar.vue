<template>
    <div
        class="flex w-full max-w-[1440px] flex-row justify-between p-8 xl:px-[170px]"
    >
        <Transition name="logo">
            <div v-show="!isSearchOpen" class="flex flex-col gap-1.5">
                <div class="text-[32px] font-semibold leading-9 text-[#444444]">
                    CardCity
                </div>
                <div class="h-5 text-sm font-semibold text-[#757575]">
                    上傳、分享你的名片
                </div>
            </div>
        </Transition>
        <!-- normal search -->
        <div
            class="relative hidden h-[48px] w-[240px] max-w-sm items-center sm:block"
        >
            <Input
                id="search"
                v-model="id"
                type="text"
                placeholder="搜尋卡片 ID"
                class="h-[48px] rounded-full pl-12"
                @enter="submit"
            />
            <span
                class="absolute inset-y-0 start-0 flex items-center justify-center px-2 pl-4"
            >
                <Search class="size-6" />
            </span>
        </div>

        <!-- mobile search -->
        <div class="flex h-[62px] flex-1 justify-end sm:hidden">
            <button
                class="search-transform z-20 flex h-12 w-12 flex-row items-center justify-center rounded-full border border-[#757575]"
                :class="{ 'w-12': !isSearchOpen, 'w-full': isSearchOpen }"
                @click="openMobileSearch"
                @mouseleave="closeMobileSearch"
            >
                <div class="flex size-12 items-center justify-center">
                    <Search class="size-5" />
                </div>
                <div class="flex-1 pl-1 pr-4">
                    <input
                        v-show="isSearchOpen"
                        ref="mobileInput"
                        v-model="id"
                        class="w-full bg-[#f7f9ff] outline-none"
                        placeholder="搜尋卡片 ID"
                        @keyup.enter="submit"
                    />
                </div>
            </button>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { Popover, PopoverTrigger, PopoverContent } from "./ui/popover";
import { Input } from "./ui/input";
import { Search, X } from "lucide-vue-next";
import { ref } from "vue";
import { useForm } from "@inertiajs/vue3";

import asset from "@/asset";

const isSearchOpen = ref(false);
const mobileInput = ref(null);
const id = ref();

const openMobileSearch = () => {
    isSearchOpen.value = true;

    setTimeout(() => {
        if (mobileInput.value) {
            mobileInput.value.focus();
        }
    }, 300);
};

const closeMobileSearch = () => {
    isSearchOpen.value = false;
};

const submit = () => {
    const form = useForm({
        _method: "get",
    });
    form.get(route("detail", id.value), {
        onSuccess: () => {
            form.reset();
        },
        errorBag: "addCard",
    });
};
</script>

<style scoped lang="scss">
@keyframes fade-in {
    0% {
        opacity: 1;
    }
    40% {
        opacity: 0;
    }
    100% {
        opacity: 0;
        width: 0;
    }
}

.logo-enter-active {
    animation: fade-in 0.3s ease reverse;
}

.logo-leave-active {
    animation: fade-in 0.3s ease;
}

.search-transform {
    transition: all 0.3s ease;
}
</style>
