<template>
    <input
        :placeholder="placeholder"
        class="h-6 border-none border-black p-0 shadow-none ring-0 focus:border-none focus:ring-0"
        v-model="value"
    />
</template>

<script lang="ts" setup>
const props = defineProps({
    placeholder: { type: String },
});

const value = defineModel();
</script>
