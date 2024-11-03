<template>
    <div class="padding-content bg-white px-4 pt-[100px] sm:px-8">
        <div class="flex flex-col gap-16">
            <div class="flex flex-row gap-8">
                <img
                    :src="asset('Arch/arch-intro1.png')"
                    class="h-[326px] w-full rounded-3xl border border-[#d9d9d9] object-cover sm:w-[50vw] sm:max-w-[640px]"
                />
                <div class="flex flex-1 flex-col gap-4">
                    <div class="text-5xl font-bold text-[#2c2c2c]">
                        您的SEO成功夥伴
                    </div>
                    <div class="text-xl font-bold text-[#444444]">
                        我們不僅提供SEO服務，更能從商業角度為您分析SEO的價值。基於豐富的實戰經驗，我們能精準評估您的商業模式，並提供最適合的SEO策略，讓您的SEO投資產生最大的效益。
                    </div>
                </div>
            </div>

            <div class="flex flex-row gap-8">
                <div class="flex flex-1 flex-col gap-4">
                    <div class="text-5xl font-bold text-[#2c2c2c]">
                        不只規劃，更要執行！
                    </div>
                    <div class="text-xl font-bold text-[#444444]">
                        我們提供全方位的SEO執行服務，從關鍵字分析到流量運營，一手包辦。讓您專注於核心業務，我們將用最快的速度，助您搶佔Google第一頁，帶來真實的流量與商機。
                    </div>
                </div>
                <img
                    :src="asset('Arch/arch-intro2.png')"
                    class="h-[326px] w-full rounded-3xl border border-[#d9d9d9] object-cover sm:w-[50vw] sm:max-w-[640px]"
                />
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import asset from "@/asset";
</script>
