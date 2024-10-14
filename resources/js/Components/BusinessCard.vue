<template>
    <div v-if="flex" class="w-full">
        <img class="w-full rounded-xl" :src="getImg(card.img)" />
    </div>

    <!-- 管理頁面 -->
    <div v-else-if="manage" class="w-fit">
        <img
            class="rounded-xl"
            :class="{
                'h-[307px]': card.height === 307,
                'h-[145px]': card.height === 145,
                'h-[288px]': card.height === 288,
            }"
            :src="getImg(card.img)"
        />
        <div class="flex w-full flex-row justify-between px-2 py-2.5">
            <div class="text-xs text-[#1e1e1e]">Card ID: {{ card.id }}</div>
            <button
                class="flex flex-row items-center gap-2 text-[#ec221f]"
                @click="deleteCard"
            >
                <Trash2 class="size-4" />
                <div>刪除</div>
            </button>
        </div>
    </div>

    <!-- 主頁 -->
    <Link v-else class="w-fit" :href="route('detail', card.id)">
        <img
            class="rounded-xl"
            :class="{
                'h-[307px]': card.height === 307,
                'h-[145px]': card.height === 145,
                'h-[288px]': card.height === 288,
            }"
            :src="getImg(card.img)"
        />
    </Link>
</template>
<script lang="ts" setup>
import getImg from "@/getImg";
import { useForm } from "@inertiajs/vue3";
import { cardType } from "@/Interface/Card";
import { Link } from "@inertiajs/vue3";
import { Trash2 } from "lucide-vue-next";

interface propsType {
    card: cardType;
    flex: Boolean;
    manage: Boolean;
}

const props = defineProps<propsType>();

const emit = defineEmits(["deleteCard"]);

const deleteCard = () => {
    const deleteForm = useForm({
        _method: "delete",
    });
    deleteForm.post(route("card.destroy", props.card.id), {
        onSuccess: () => {
            console.log("delete");
            emit("deleteCard");
        },
    });
};
</script>
<style lang="css" scoped></style>
