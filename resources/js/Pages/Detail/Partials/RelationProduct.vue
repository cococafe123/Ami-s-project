<template>
    <div class="flex w-full justify-center pb-[140px] pt-[54px]">
        <div class="padding-x-max-120 w-full max-w-[1440px]">
            <ProductSection v-model="productsNum" />
            <div class="flex w-full justify-center">
                <button
                    class="rounded-lg border border-[#B88E2F] bg-white px-[90px] py-3"
                    @click="productViewIncrecement"
                >
                    <div
                        class="font-poppins text-base font-semibold text-[#B88E2F]"
                    >
                        顯示更多
                    </div>
                </button>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ref, reactive } from "vue";

const productsNum = ref(4);

const productViewIncrecement = () => {
    productsNum.value = productsNum.value + 4;
};
</script>

<style lang="scss" scoped>
.padding-x-max-120 {
    padding-left: min(120px, 5vw);
    padding-right: min(120px, 5vw);
}
</style>
