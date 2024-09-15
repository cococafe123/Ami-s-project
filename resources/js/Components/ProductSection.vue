<template>
    <div class="flex w-full content-center justify-center">
        <div class="flex w-full flex-row justify-around gap-8 py-8">
            <Product v-for="product in products" :product="product" />
        </div>
    </div>
</template>
<script lang="ts" setup>
import asset from "@/asset";
import { ref, reactive, onMounted, computed } from "vue";
import { getTestProduct } from "@/GetTestProduct";
import Product from "./Product.vue";

const props = defineProps({
    // product: { type: null },
});

const productsNum: any = defineModel();

const products = computed(() => {
    return getTestProduct(productsNum.value);
});
</script>
