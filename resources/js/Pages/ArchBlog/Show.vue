<template>
    <div
        class="min-w-screen flex size-full min-h-screen flex-col content-center bg-gray-200"
    >
        <div class="arch-bg h-full w-full max-w-[1440px]">
            <NavBar />
            <Block1Title />
            <Block2Content />
            <Footer />
        </div>
    </div>
</template>
<script lang="ts" setup>
import NavBar from "./Partials/NavBar.vue";
import Block1Title from "./Partials/Block1Title.vue";
import Block2Content from "./Partials/Block2Content.vue";
import Footer from "./Partials/Footer.vue";
</script>
<style lang="scss">
.padding-content {
    @media (min-width: 1024px) {
        padding-right: min(170px, 10vw);
        padding-left: min(170px, 10vw);
    }
}
</style>
