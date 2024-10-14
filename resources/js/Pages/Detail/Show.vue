<template>
    <Frame>
        <div class="w-full max-w-[1440px]">
            <MainView v-model="currentCard" />
        </div>
    </Frame>
</template>
<script lang="ts" setup>
import { cloneDeep } from "lodash";
import { ref } from "vue";
import MainView from "./Partials/MainView.vue";
import { cardType } from "@/Interface/Card";

import NavBar from "@/Components/NavBar.vue";

interface propsType {
    current: cardType;
}

const props = defineProps<propsType>();

const currentCard = ref(cloneDeep(props.current));
</script>
