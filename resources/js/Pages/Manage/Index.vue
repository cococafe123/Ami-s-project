<template>
    <Frame>
        <div class="w-full max-w-[1440px]">
            <MainView :card="card" :manage="manage" />
        </div>
    </Frame>
</template>
<script lang="ts" setup>
import MainView from "./Partials/MainView.vue";
import { cardType } from "@/Interface/Card";

interface propsType {
    card: Array<cardType>;
    manage: Boolean;
}

const props = defineProps<propsType>();
</script>
