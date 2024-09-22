<template>
    <Frame>
        <div class="flex w-full justify-center bg-[#F9F1E7]">
            <Route />
        </div>
        <div class="w-full border-b border-[#d9d9d9]">
            <MainView />
        </div>
        <div class="w-full border-b border-[#d9d9d9]">
            <Intro />
        </div>
        <RelationProduct />
    </Frame>
</template>
<script lang="ts" setup>
import { Route, MainView, Intro, RelationProduct } from "./Partials";
</script>
