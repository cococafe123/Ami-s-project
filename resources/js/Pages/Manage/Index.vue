<template>
    <Frame>
        <div class="w-full max-w-[1440px]">
            <MainView :total-card-num="totalCardNum" />
        </div>
    </Frame>
</template>
<script lang="ts" setup>
import MainView from "./Partials/MainView.vue";
import { cardType } from "@/Interface/Card";

interface propsType {
    totalCardNum: Number;
}

const props = defineProps<propsType>();
</script>
