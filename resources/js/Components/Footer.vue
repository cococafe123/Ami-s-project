<template>
    <div
        class="flex w-full flex-col justify-center gap-4 border-t border-[#757575] py-8"
    >
        <img :src="asset('CodeCity-logo.svg')" />
        <div class="text-center text-xs font-normal text-[#42474e]">
            © 2024 CodeCity Inc.
        </div>
    </div>
</template>
<script lang="ts" setup>
import asset from "@/asset";
</script>
