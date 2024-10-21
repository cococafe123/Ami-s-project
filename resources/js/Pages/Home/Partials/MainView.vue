<template>
    <div class="w-full px-8 pb-6 sm:pb-16 xl:px-[170px]">
        <div class="flex flex-row justify-between gap-1 p-2">
            <div class="flex flex-row content-center gap-2">
                <img :src="asset('element-tv.svg')" />
                <div
                    class="items-center text-[11px] font-normal leading-4 text-[#757575]"
                >
                    共{{ totalCardNum }}張名片
                </div>
            </div>
            <button class="flex flex-row gap-2.5 p-2">
                <div class="">{{}}</div>
                <ChevronsUpDown class="size-4 stroke-1" />
            </button>
        </div>
        <div class="w-full p-2">
            <label
                for="add-card-img-input"
                class="button-shadow mb-6 block w-full rounded-lg border border-[#D9D9D9] bg-[#F7F9FF] px-3 py-3"
                type="button"
            >
                <div
                    class="flex w-full flex-row items-center justify-center gap-2"
                >
                    <Plus class="size-4" />
                    <div class="text-sm text-[#5a5a5a]">新增你的名片</div>
                </div>
            </label>
        </div>
        <input
            ref="imgInput"
            class="hidden"
            type="file"
            id="add-card-img-input"
            accept="image/png, image/jpeg, image/gif"
            @change="submit"
        />
        <BusinessCardIndex ref="cardIndex" :manage="false" />
    </div>
</template>
<script lang="ts" setup>
import { ref, onUpdated } from "vue";
import { Plus } from "lucide-vue-next";
import { useForm } from "@inertiajs/vue3";
import { ChevronsUpDown } from "lucide-vue-next";

import asset from "@/asset";
import { cardType } from "@/Interface/Card";
import BusinessCardIndex from "@/Components/BusinessCardIndex.vue";

interface propsType {
    totalCardNum: Number;
}

const props = defineProps<propsType>();

const cardIndex = ref(null);

const sort = ref("desc");

const form = useForm({
    img: "",
});

const imgInput = ref(null);

const changeSort = () => {
    if (sort.value === "desc") {
        sort.value = "asc";
    }
};

const submit = () => {
    var files = imgInput.value.files;
    form.img = files[0];
    form.post(route("card.store"), {
        onSuccess: () => {
            form.reset();
            cardIndex.value.changeCardContent();
        },
        errorBag: "addCard",
    });
};
</script>
<style lang="scss" scoped>
.button-shadow {
    box-shadow: var(--sds-size-depth-0) var(--sds-size-depth-100)
        var(--sds-size-depth-100) var(--sds-size-depth-negative-100)
        var(--sds-color-black-100);

    box-shadow: var(--sds-size-depth-0) var(--sds-size-depth-400)
        var(--sds-size-depth-800) var(--sds-size-depth-negative-100)
        var(--sds-color-black-200);
}
</style>
