<template>
    <input
        :placeholder="placeholder"
        class="h-6 border-none border-black p-0 shadow-none ring-0 focus:border-none focus:ring-0"
    />
</template>

<script lang="ts" setup>
const props = defineProps({
    placeholder: { type: String },
});
</script>
