<template>
    <div
        class="flex size-full min-h-screen content-between justify-center bg-[#F7F9FF]"
    >
        <NavBar class="h-fit w-full" />
        <div class="flex min-h-[80vh] grow justify-center">
            <slot />
        </div>
        <Footer class="h-fit w-full" />
    </div>
</template>
<script lang="ts" setup>
import Footer from "./Footer.vue";
import NavBar from "./NavBar.vue";
</script>
