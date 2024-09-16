<template>
    <ProductSection v-model="productsNum" />
    <div class="flex w-full justify-center">
        <button
            class="rounded-lg border border-[#B88E2F] bg-white px-[90px] py-3"
            @click="productViewIncrecement"
        >
            <div class="font-poppins text-base font-semibold text-[#B88E2F]">
                顯示更多
            </div>
        </button>
    </div>
</template>
<script lang="ts" setup>
import { ref, reactive } from "vue";

const productsNum = ref(8);

const productViewIncrecement = () => {
    productsNum.value = productsNum.value + 8;
};
</script>
