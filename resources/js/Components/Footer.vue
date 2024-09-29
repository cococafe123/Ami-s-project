<template>
    <div class="w-full border-t border-[#757575]" />
    <div class="w-full py-8 flex flex-col gap-4 justify-center">
        <img :src="asset('CodeCity-logo.svg')" />
        <div class="font-normal text-xs text-[#42474e] text-center">
            © 2024 CodeCity Inc.
        </div>
    </div>
</template>
<script lang="ts" setup>
import asset from "@/asset";
</script>
