<template>
    <Frame>
        <!-- 主視圖 -->
        <MainView />
        <!-- 本月主打 -->
        <div class="padding-items w-full max-w-[1440px] py-20">
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
import { BrandImage, MonthSelling, MainView } from "./Partials";
</script>

<style scoped lang="scss">
.padding-items {
    padding-left: min(120px, 5vw);
    padding-right: min(120px, 5vw);
}
</style>
