<template>
    <div class="padding-content bg-white px-4 pt-[100px] sm:px-8">
        <div class="text-5xl font-bold text-[#2c2c2c]">成功案例</div>

        <div class="flex flex-col items-center gap-6 py-9">
            <div
                class="flex flex-col items-start gap-4 rounded-3xl border border-[#d9d9d9] bg-[#f5f5f5] px-8 pb-8 pt-6"
            >
                <img :src="asset('Arch/element-hydro-logo.svg')" />
                <div class="">
                    <div class="text-xl font-semibold text-[#1e1e1e]">
                        SEO助攻，馬拉松環保杯銷量狂飆
                    </div>
                    <div class="font-base text-base text-[#1e1e1e]">
                        透過精準的SEO策略，將Hydroglide的環保杯推向更多馬拉松愛好者，成功提升品牌知名度，帶動產品銷量大幅成長。綠色環保、健康飲水、馬拉松必備
                    </div>
                </div>
            </div>

            <div
                class="flex flex-col items-start gap-4 rounded-3xl border border-[#d9d9d9] bg-[#f5f5f5] px-8 pb-8 pt-6"
            >
                <img :src="asset('Arch/element-codecity-logo.svg')" />
                <div class="">
                    <div class="text-xl font-semibold text-[#1e1e1e]">
                        SEO加持，數位解決方案獲更多企業青睞
                    </div>
                    <div class="font-base text-base text-[#1e1e1e]">
                        透過專業的SEO服務，CodeCity的數位解決方案在搜尋引擎中脫穎而出，成功吸引更多企業客戶，提升品牌影響力。軟體開發、數位轉型、客製化解決方案
                    </div>
                </div>
            </div>

            <button
                class="rounded-lg bg-[#1D91D7] px-7 py-4 text-base text-[#F5F5F5]"
            >
                更多案例
            </button>
        </div>
    </div>
</template>
<script lang="ts" setup>
import asset from "@/asset";
</script>
