<template>
    <!-- <img v-if="type === 'normal'" :src="getImg(url)" />
    <img class="pb-[7px]" v-else :src="getImg(url)" /> -->
    <button @click="">
        <img class="rounded-xl" :src="getImg(card.img)" />
    </button>
    <!-- <div v-if="type === 'normal'" class=" bg-black" />
    <div v-else class=" bg-white pb-[7px]" /> -->
</template>
<script lang="ts" setup>
import getImg from "@/getImg";
import { useForm } from "@inertiajs/vue3";

interface cardType {
    img: String;
    like: Number;
    QRCode: String;
    id: String;
}

interface card {
    card: cardType;
}

const props = defineProps<card>();

const deleteCard = () => {
    const deleteForm = useForm({
        _method: "delete",
    });
    deleteForm.post(route("card.destroy", props.card.id), {
        onSuccess: () => {},
    });
};
</script>
