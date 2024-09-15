<template>
    <ProductSection v-model="productsNum" />
</template>
<script lang="ts" setup>
import { ref, reactive } from "vue";

const productsNum = ref(8);
</script>
