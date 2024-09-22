<template>
    <div
        class="flex flex-row gap-6 rounded-xl border border-[#9F9F9F] px-4 py-5"
    >
        <button @click="value--">
            <img :src="asset('element-minus.svg')" />
        </button>
        <Input
            class="w-8 self-center text-center font-medium"
            v-model="value"
        />
        <button @click="value++">
            <img :src="asset('element-plus.svg')" />
        </button>
    </div>
</template>
<script lang="ts" setup>
import asset from "@/asset";
import Input from "./Input.vue";

const value: any = defineModel();
</script>
