<template>
    <button
        v-for="(item, index) in items"
        class="rounded px-1.5 py-1 text-[14px]"
        :class="{
            'bg-[#B88E2F] text-white': currentIndex === index,
            'bg-[#F9F1E7] text-[#3a3a3a]': currentIndex !== index,
        }"
        @click="chooseIndex(index)"
    >
        {{ item }}
    </button>
</template>
<script lang="ts" setup>
import { ref } from "vue";

const props = defineProps({
    items: { type: Array<String> },
});

const currentIndex = ref(0);

const chooseIndex = (index: number) => {
    currentIndex.value = index;
};
</script>
