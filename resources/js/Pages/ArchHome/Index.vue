<template>
    <div
        class="min-w-screen flex size-full min-h-screen flex-col content-center bg-gray-200"
    >
        <div class="arch-bg h-full w-full max-w-[1440px]">
            <NavBar />
            <Block1MainView />
            <Block2Data />
            <Block3Success />
            <Block4Intro />
            <Block5Story />
            <Footer />
        </div>
    </div>
</template>
<script lang="ts" setup>
import NavBar from "./Partials/NavBar.vue";
import Block1MainView from "./Partials/Block1MainView.vue";
import Block2Data from "./Partials/Block2Data.vue";
import Block3Success from "./Partials/Block3Success.vue";
import Block4Intro from "./Partials/Block4Intro.vue";
import Block5Story from "./Partials/Block5Story.vue";
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
