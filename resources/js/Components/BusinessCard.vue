<template>
    <!-- <img v-if="type === 'normal'" :src="getImg(url)" />
    <img class="pb-[7px]" v-else :src="getImg(url)" /> -->
    <img
        v-if="card.type === 'normal'"
        class="h-[145px] w-[256px] rounded-xl"
        :src="asset(card.img)"
    />
    <div v-else class="pb-[7px]">
        <img class="h-[307px] w-[256px] rounded-xl" :src="asset(card.img)" />
    </div>
    <!-- <div v-if="type === 'normal'" class=" bg-black" />
    <div v-else class=" bg-white pb-[7px]" /> -->
</template>
<script lang="ts" setup>
import asset from "@/asset";
import getImg from "@/getImg";

interface cardType {
    img: String;
    type: String;
    like: Number;
    qrcode: String;
    url: String;
}

interface card {
    card: cardType;
}

const props = defineProps<card>();
</script>
