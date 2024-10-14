<template>
    <Frame>
        <div class="w-full max-w-[1440px]">
            <MainView :current="current" />
        </div>
    </Frame>
</template>
<script lang="ts" setup>
import MainView from "./Partials/MainView.vue";
import { cardType } from "@/Interface/Card";

interface propsType {
    current: cardType;
}

const props = defineProps<propsType>();
</script>
