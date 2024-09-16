<template>
    <div class="h-[1px] w-full bg-black opacity-15" />
    <div class="flex w-full max-w-[1440px] flex-col gap-6 px-[100px] py-[50px]">
        <div class="flex flex-row justify-between gap-6">
            <div class="flex flex-col gap-10">
                <div class="text-2xl font-medium text-black">CakeShop</div>
                <div class="flex flex-col gap-1">
                    <div class="text-base text-[#9f9f9f]">電話：02-1234567</div>
                    <div class="text-base text-[#9f9f9f]">
                        電子郵件：cakeshop@gmail.com
                    </div>
                    <div class="text-base text-[#9f9f9f]">
                        地址：台北市中山區南京東路一段123號
                    </div>
                </div>
            </div>
            <div class="flex flex-col justify-start gap-6 md:gap-10">
                <div class="w-full">
                    <button class="text-base text-[#9f9f9f]">新聞及時報</button>
                </div>
                <div class="flex flex-row gap-2">
                    <div class="">
                        <Input placeholder="您的電子郵件地址" />
                        <div class="border-b border-black" />
                    </div>
                    <div class="">
                        <button
                            class="font-poppins text-sm font-medium text-black"
                        >
                            訂閱電子報
                        </button>
                        <div class="border-b border-black" />
                    </div>
                </div>
            </div>
        </div>
        <div class="border-b border-[#d9d9d9]" />
        <div class="font-poppins text-base font-normal text-black">
            2023 cakeshop. All rights reserved
        </div>
    </div>
</template>
<script lang="ts" setup>
import Input from "./Input.vue";
</script>
