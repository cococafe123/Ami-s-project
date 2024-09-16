<template>
    <ProductSection v-model="productsNum" />
    <div class="flex content-center justify-center">
        <Pagintation class="" :pages="10" v-model="currentPage" />
    </div>
</template>
<script lang="ts" setup>
import { ref, watch } from "vue";

const productsNum = ref(12);
const currentPage = ref(1);

watch(currentPage, () => {
    productsNum.value = 0;
    setTimeout(() => {
        productsNum.value = 12;
    }, 100);
});
</script>
