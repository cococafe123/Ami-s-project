<template>
    <Frame>
        <div class="w-full max-w-[1440px]">
            <MainView :card="card" />
        </div>
    </Frame>
</template>
<script lang="ts" setup>
import MainView from "./Partials/MainView.vue";

interface card {
    img: String;
    like: Number;
    QRCode: String;
    id: String;
}

interface propsType {
    card: Array<card>;
}

const props = defineProps<propsType>();
</script>
