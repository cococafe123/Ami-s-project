<template>
    <div class="flex flex-row gap-4">
        <button
            class="h-[60px] self-center rounded-lg bg-[#F9F1E7] px-5 py-2 text-black"
            :disabled="currentPage === 1"
            @click="currentPage--"
        >
            Prev
        </button>
        <!-- first page -->
        <button
            class="size-[60px] self-center rounded-lg bg-[#F9F1E7] px-2 py-2 text-black"
            :disabled="currentPage === 1"
            :class="{ 'bg-[#B88E2F] text-white': currentPage === 1 }"
            @click="currentPage = 1"
        >
            1
        </button>
        <div
            v-if="currentPage > 3"
            class="flex flex-row content-center justify-center gap-2"
        >
            <div class="size-2 rounded-full bg-[#f9f1e7]" />
            <div class="size-2 rounded-full bg-[#f9f1e7]" />
            <div class="size-2 rounded-full bg-[#f9f1e7]" />
        </div>
        <button
            v-for="(page, index) in pages - 2"
            class="size-[60px] self-center rounded-lg bg-[#F9F1E7] px-2 py-2 text-black"
            :class="{
                hidden: currentPage > page + 2 || currentPage < page - 0,
                'bg-[#B88E2F] text-white': currentPage === page + 1,
            }"
            @click="currentPage = page + 1"
        >
            {{ page + 1 }}
        </button>
        <div
            v-if="pages > currentPage + 1"
            class="flex flex-row content-center justify-center gap-2"
        >
            <div class="size-2 rounded-full bg-[#f9f1e7]" />
            <div class="size-2 rounded-full bg-[#f9f1e7]" />
            <div class="size-2 rounded-full bg-[#f9f1e7]" />
        </div>
        <!-- last Page -->
        <button
            class="size-[60px] self-center rounded-lg bg-[#F9F1E7] px-2 py-2 text-black"
            :class="{
                hidden: pages === 1,
                'bg-[#B88E2F] text-white': currentPage === pages,
            }"
            @click="currentPage = pages"
        >
            {{ pages }}
        </button>
        <button
            class="h-[60px] self-center rounded-lg bg-[#F9F1E7] px-5 py-2 text-black"
            :disabled="currentPage === pages"
            @click="currentPage++"
        >
            Next
        </button>
    </div>
</template>

<script lang="ts" setup>
import { ref } from "vue";

const props = defineProps({
    pages: { type: Number },
});

const currentPage = defineModel();
</script>
