<template>
    <Frame>
        <!-- 本月主打 -->
        <div class="w-full max-w-[1440px] px-10 sm:px-20 lg:px-[120px]">
            <div
                class="font-poppins w-full text-center text-[40px] font-bold leading-[48px] text-[#3A3A3A]"
            >
                本月主打產品
            </div>
            <MonthSelling />
        </div>
        <!-- 品牌保證 -->
        <BrandImage />
    </Frame>
</template>

<script lang="ts" setup>
import { BrandImage, MonthSelling } from "./Partials";
</script>

<style scoped lang="scss"></style>
