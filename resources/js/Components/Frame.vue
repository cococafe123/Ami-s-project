<template>
    <div class="size-full flex justify-center bg-[#F7F9FF]">
        <NavBar />
        <slot />
        <Footer />
    </div>
</template>
<script lang="ts" setup>
import Footer from "./Footer.vue";
import NavBar from "./NavBar.vue";
</script>
