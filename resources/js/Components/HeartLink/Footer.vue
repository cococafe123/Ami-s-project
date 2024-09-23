<template>
    <div class="flex w-full justify-center">
        <div class="w-full max-w-[1440px] px-10 pb-20 pt-10">
            <div class="flex w-full flex-row justify-center gap-6 py-6">
                <div class="text-sm font-light text-[#E2E2E2]">產品介紹</div>
                <div class="text-sm font-light text-[#E2E2E2]">
                    了解 HeartLink
                </div>
                <div class="text-sm font-light text-[#E2E2E2]">新聞消息</div>
            </div>

            <div class="w-full px-10">
                <div
                    class="flex w-full flex-col content-center border-t border-[#989898]"
                >
                    <div class="flex flex-row justify-center gap-4 pt-8">
                        <img :src="asset('HeartLink/Logo.svg')" />
                        <div class="self-center text-5xl text-[#E2E2E2]">
                            HeartLink
                        </div>
                    </div>
                    <div
                        class="w-full max-w-[600px] self-center pt-8 text-[10px] font-light text-[#989898]"
                    >
                        HeartLink 是一個由 HeartLink (Singapore) Pte. Limited
                        完全擁有的社交平台。我們致力於提供全面的交友服務，包括創建真實的社交連結，幫助用戶建立深厚的友誼網絡。我們提供個性化的配對建議，支持用戶探索各種興趣圈子，並通過活動和功能增強用戶體驗，讓每段友誼都能持續升值。
                    </div>
                    <div class="flex w-full flex-row justify-center gap-4 pt-8">
                        <div class="text-[10px] font-light text-white">
                            HeartLink.com
                        </div>
                        <div class="h-[14px] w-[1px] bg-[#989898]" />
                        <div class="text-[10px] font-light text-white">
                            使用者合約
                        </div>
                        <div class="h-[14px] w-[1px] bg-[#989898]"></div>
                        <div class="text-[10px] font-light text-white">
                            隱私權政策
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import asset from "@/asset";
</script>
