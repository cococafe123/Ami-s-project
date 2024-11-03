<template>
    <div class="bg-white px-10 pb-20 pt-16">
        <div class="border-t border-[#989898] pt-8">
            <div class="flex flex-row items-center pb-8">
                <img :src="asset('Arch/element-logo-2.svg')" />
                <div
                    class="text-[40px] font-bold leading-[44px] text-[#2c2c2c]"
                >
                    Arch
                </div>
            </div>
            <div class="pb-2 text-[#5a5a5a]">Hello@Arch.tw</div>
            <div class="pb-2 text-[#5a5a5a]">02-4134352</div>
            <div class="pb-8 text-[#5a5a5a]">台北市基隆路三段 47 號</div>
            <div class="w-full border-t border-[#b2b2b2] pb-8" />
            <div class="flex flex-row gap-4">
                <div class="text-[10px] leading-[13px] text-[#444444]">
                    2023 Arch. All rights reserved
                </div>
                <div class="w-[1px] bg-[#989898]" />
                <div class="text-[10px] leading-[13px] text-[#444444]">
                    隱私權政策
                </div>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
import asset from "@/asset";
</script>
