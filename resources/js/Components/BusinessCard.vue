<template>
    <img v-if="type === 'normal'" :src="getImg(url)" />
    <img v-else :src="getImg(url)" />
</template>
<script lang="ts" setup>
import getImg from "@/getImg";

const props = defineProps({
    type: { type: String },
    url: { type: String },
});
</script>
