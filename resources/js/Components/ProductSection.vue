<template>
    <div class="flex w-full content-center justify-center gap-8 py-8">
        <div
            v-for="(products, index) in productArray"
            class="flex w-full flex-row justify-around"
        >
            <Product v-for="product in products" :product="product" />
        </div>
    </div>
</template>
<script lang="ts" setup>
import asset from "@/asset";
import {
    ref,
    reactive,
    onMounted,
    computed,
    onUnmounted,
    onUpdated,
} from "vue";
import { getTestProduct } from "@/GetTestProduct";
import Product from "./Product.vue";
import { cloneDeep } from "lodash";

const props = defineProps({
    // product: { type: null },
});

const productsNum: any = defineModel();

const productData = computed(() => {
    return getTestProduct(productsNum.value);
});

const productArray = ref(null);

const lineMaxNum = ref(0);

const resize = () => {
    const width: number = Math.min(1440, window.innerWidth);
    let maxPadding: number = Math.min(240, width * 0.05);
    lineMaxNum.value = Math.floor((width - maxPadding) / (276 + 32));

    let arrays: Array<Array<object>> = [];
    let array: Array<object> = [];
    let count: number = 0;

    productData.value.forEach((element) => {
        count++;
        array.push(cloneDeep(element));
        if (count >= lineMaxNum.value) {
            count = 0;
            arrays.push(cloneDeep(array));
            array.length = 0;
        }
    });
    if (count !== 0) {
        for (let i = count; i < lineMaxNum.value; i++) {
            array.push(null);
        }
        arrays.push(cloneDeep(array));
    }
    productArray.value = arrays;
};

onMounted(() => {
    resize();
    console.log(productArray);
    window.addEventListener("resize", resize);
});

onUnmounted(() => {
    window.removeEventListener("resize", resize);
    console.log("b");
});

onUpdated(() => {
    window.removeEventListener("resize", resize);
    window.addEventListener("resize", resize);
});
</script>
