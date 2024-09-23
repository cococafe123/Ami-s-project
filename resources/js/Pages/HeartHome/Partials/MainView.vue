<template>
    <div class="relative w-full">
        <img
            class="bg-main shadow-main h-[674px] w-full object-cover object-center"
            :src="asset('HeartLink/main.svg')"
        />
        <div class="absolute left-0 top-0 flex h-[674px] w-full justify-center">
            <div
                class="flex w-full max-w-[1440px] flex-col justify-center gap-4 pl-[60px] lg:pl-[170px]"
            >
                <div
                    class="font-bri text-4xl font-bold text-[#e9e9f0] lg:text-[64px]"
                >
                    遇見真心，連結美好
                </div>
                <button
                    class="bg-button w-fit rounded-full px-7 py-4 font-semibold text-[#f2f2f9]"
                >
                    建立帳號
                </button>
            </div>
        </div>
        <div class="absolute left-0 top-0 flex h-[674px] w-full justify-center">
            <div class="w-full max-w-[1440px]">
                <NavBar />
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import asset from "@/asset";
import NavBar from "@/Components/HeartLink/NavBar.vue";
</script>

<style lang="scss" scoped>
.bg-main {
    background: linear-gradient(0deg, rgba(0, 0, 0, 0.3), rgba(0, 0, 0, 0.3)),
        linear-gradient(180deg, rgba(0, 0, 0, 0.8) 0%, rgba(0, 0, 0, 0) 41.17%);
}

.shadow-main {
    box-shadow: var(--sds-size-depth-0) var(--sds-size-depth-100)
        var(--sds-size-depth-100) var(--sds-size-depth-negative-100)
        var(--sds-color-black-100);

    box-shadow: var(--sds-size-depth-0) var(--sds-size-depth-400)
        var(--sds-size-depth-800) var(--sds-size-depth-negative-100)
        var(--sds-color-black-200);
}

.bg-button {
    background: linear-gradient(263.41deg, #c3c743 0%, #d0782c 79.31%);
}
</style>
