<template>
    <button @click="" class="w-fit">
        <img class="rounded-xl" :src="getImg(card.img)" />
    </button>
</template>
<script lang="ts" setup>
import getImg from "@/getImg";
import { useForm } from "@inertiajs/vue3";

interface cardType {
    img: String;
    like: Number;
    height: Number;
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
