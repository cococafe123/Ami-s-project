<template>
    <div class="padding-content bg-white px-4 pb-[100px] pt-16 sm:px-8">
        <div class="flex flex-col gap-3 pb-16">
            <div class="text-5xl font-bold text-[#2c2c2c]">O2O是什麼？</div>
            <div class="font-base text-xl text-[#444444]">
                O2O，全名為Online to
                Offline，也就是「線上到線下」。簡單來說，就是將線上的行銷活動與線下的實體商店結合，創造出更完整的消費體驗。舉個例子，你可以在手機上預訂餐廳，然後到店裡用餐，這就是O2O的典型案例。
            </div>
        </div>

        <div class="flex flex-col gap-3">
            <div class="text-5xl font-bold text-[#2c2c2c]">
                為什麼O2O這麼重要？
            </div>
            <div class="flex flex-row">
                <img :src="asset('Arch/element-dot.svg')" />
                <div class="font-base text-xl text-[#444444]">
                    提升顧客體驗：
                    O2O讓消費者可以更方便地獲取資訊，並享受更個人化的服務。
                </div>
            </div>
            <div class="flex flex-row">
                <img :src="asset('Arch/element-dot.svg')" />
                <div class="font-base text-xl text-[#444444]">
                    增加銷售機會：
                    線上行銷可以吸引更多潛在顧客，線下商店則能提供更直接的購物體驗，增加銷售機會。
                </div>
            </div>
            <div class="flex flex-row">
                <img :src="asset('Arch/element-dot.svg')" />
                <div class="font-base text-xl text-[#444444]">
                    數據分析：
                    O2O能收集到更多的消費者數據，幫助商家更了解顧客的需求，並進行更精準的行銷。
                </div>
            </div>
        </div>
        <div class="py-16">
            <img :src="asset('Arch/arch-laptop.png')" />
        </div>

        <div class="flex flex-col gap-3">
            <div class="text-5xl font-bold text-[#2c2c2c]">
                3步驟打造你的O2O商業模式
            </div>
            <div class="font-base text-2xl font-semibold text-[#444444]">
                建立線上平台
            </div>
            <div class="flex flex-row pl-8">
                <img :src="asset('Arch/element-dot.svg')" />
                <div class="font-base text-xl text-[#444444]">
                    建立一個完善的網站或APP，提供產品或服務資訊、線上訂購、會員管理等功能。
                </div>
            </div>
            <div class="flex flex-row pl-8">
                <img :src="asset('Arch/element-dot.svg')" />
                <div class="font-base text-xl text-[#444444]">
                    善用社群媒體，與顧客互動，建立品牌形象。
                </div>
            </div>

            <div class="font-base text-2xl font-semibold text-[#444444]">
                整合線上線下
            </div>
            <div class="flex flex-row pl-8">
                <img :src="asset('Arch/element-dot.svg')" />
                <div class="font-base text-xl text-[#444444]">
                    提供線上預約、取貨、退換貨等服務，讓顧客享受無縫的購物體驗。
                </div>
            </div>
            <div class="flex flex-row pl-8">
                <img :src="asset('Arch/element-dot.svg')" />
                <div class="font-base text-xl text-[#444444]">
                    透過QR code、優惠券等方式，將線上顧客導流到線下商店。
                </div>
            </div>
            <div class="flex flex-row pl-8">
                <img :src="asset('Arch/element-dot.svg')" />
                <div class="font-base text-xl text-[#444444]">
                    利用會員系統，記錄顧客的消費行為，提供個人化的推薦與服務。
                </div>
            </div>

            <div class="font-base text-2xl font-semibold text-[#444444]">
                數據分析與優化
            </div>
            <div class="flex flex-row pl-8">
                <img :src="asset('Arch/element-dot.svg')" />
                <div class="font-base text-xl text-[#444444]">
                    透過數據分析工具，了解顧客的行為模式與偏好。
                </div>
            </div>
            <div class="flex flex-row pl-8">
                <img :src="asset('Arch/element-dot.svg')" />
                <div class="font-base text-xl text-[#444444]">
                    不斷優化線上線下的服務，提升顧客滿意度。
                </div>
            </div>
        </div>
    </div>
</template>
<script setup lang="ts">
import asset from "@/asset";
</script>
