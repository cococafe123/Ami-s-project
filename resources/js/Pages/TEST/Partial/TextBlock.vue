<template>
    <button
        ref="textRef"
        class="absolute"
        :style="textBlockStyle"
        @mousedown="startTextDrag($event)"
        @click="isChoosing = true"
    >
        <div class="relative">
            <div class="absolute top-[-20px]" :class="{ hidden: !isChoosing }">
                <button @click.stop="editInputValue">
                    <img
                        :src="asset('Test/element-pencil.svg')"
                        class="size-4"
                    />
                </button>
            </div>
        </div>
        <!-- {{ textContent }} -->
        <input
            v-model="textContent"
            ref="inputRef"
            class="border-none border-black bg-transparent p-0 shadow-none ring-0 focus:border-none focus:ring-0"
            :readonly="!isTexting"
            :style="{ width: `${textContent.length - 3}ch` }"
        />
    </button>
</template>
<script setup lang="ts">
import asset from "@/asset";
import { ref, computed } from "vue";
import { onClickOutside } from "@vueuse/core";
import Input from "@/Components/Input.vue";

const textRef = ref();

const inputRef = ref();

const textBlockPosition = ref({ x: 217, y: 472, isDragging: false });

const textContent = ref("test button");

const isChoosing = ref(false);

const isTexting = ref(false);

const textBlockStyle = computed(() => {
    return {
        left: `${textBlockPosition.value.x}px`,
        top: `${textBlockPosition.value.y}px`,
        cursor: textBlockPosition.value.isDragging ? "grabbing" : "grab",
    };
});

onClickOutside(textRef, (event: any) => (isChoosing.value = false));

const startTextDrag = (event: MouseEvent) => {
    textBlockPosition.value.isDragging = true;
    const startX = event.clientX - textBlockPosition.value.x;
    const startY = event.clientY - textBlockPosition.value.y;

    const onMouseMove = (moveEvent: MouseEvent) => {
        if (textBlockPosition.value.isDragging) {
            textBlockPosition.value.x = moveEvent.clientX - startX;
            textBlockPosition.value.y = moveEvent.clientY - startY;
        }
    };

    const onMouseUp = () => {
        textBlockPosition.value.isDragging = false;
        window.removeEventListener("mousemove", onMouseMove);
        window.removeEventListener("mouseup", onMouseUp);
    };

    window.addEventListener("mousemove", onMouseMove);
    window.addEventListener("mouseup", onMouseUp);
};

const editInputValue = (event: any) => {
    event.stopPropagation();
    console.log("test");

    if (inputRef.value) {
        inputRef.value.focus();
    }
};
</script>
