<template>
    <div class="flex w-full flex-row justify-between px-8 py-6">
        <Link :href="route('ArchHome')" class="flex flex-row">
            <img :src="asset('/Arch/element-logo.svg')" />
            <div class="text-[40px] font-bold leading-[44px] text-[#e6e6e6]">
                Arch
            </div>
        </Link>
        <div class="flex flex-row gap-6 text-[#e6e6e6]">
            <button>服務方案</button>
            <button>成功案例</button>
            <button>關於Arch</button>
        </div>
        <div class="relative hidden h-[48px] w-[240px] items-center sm:block">
            <span
                class="absolute inset-y-0 end-0 flex items-center justify-center px-2 pl-4"
            >
                <img :src="asset('/Arch/element-search.svg')" />
            </span>
            <Input
                id="search"
                type="text"
                placeholder="搜尋卡片 ID"
                class="h-[48px] rounded-full pl-4"
            />
        </div>
    </div>
</template>
<script lang="ts" setup>
import { Link } from "@inertiajs/vue3";

import asset from "@/asset";
</script>
