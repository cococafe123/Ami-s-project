<template>
    <div class="flex w-full max-w-[1440px] flex-row justify-between px-10 py-6">
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
            <button class="flex size-6 flex-col justify-around md:hidden">
                <div class="h-1 w-full rounded bg-black" />
                <div class="h-1 w-full rounded bg-black" />
                <div class="h-1 w-full rounded bg-black" />
            </button>
        </div>
    </div>
</template>

<script lang="ts" setup>
import { Link } from "@inertiajs/vue3";
import asset from "@/asset";
</script>
