<template>
    <v-group @mouseenter="mouseIn" @mouseleave="mouseLeave">
        <v-image
            ref="imageRef"
            :config="combineConfig"
            @dragmove="handleDragMove"
            @click="showEditGroup"
        />
        <!-- 筆圖示 -->
        <v-group ref="groupRef">
            <v-rect :config="editGroupConfig" />
            <v-image :config="iconDeleteConfig" @click="deleteClick" />
        </v-group>
        <v-transformer ref="transformerRef" />
    </v-group>
</template>
<script setup lang="ts">
import { ref, reactive, inject, Ref, onMounted, computed } from "vue";
import { onClickOutside } from "@vueuse/core";

interface propsType {}

interface outConfigType {
    mainImage: any;
    width: Number;
    height: Number;
    index: Number;
}

const props = defineProps<propsType>();

const outConfig = defineModel<outConfigType>("config");

const emits = defineEmits(["deleteNode", "leave"]);

const imageConfig = reactive({
    x: 50,
    y: 50,
    draggable: true,
});

const combineConfig = computed(() => {
    return {
        x: imageConfig.x,
        y: imageConfig.y,
        draggable: imageConfig.draggable,
        image: outConfig.value.mainImage,
        width: outConfig.value.width,
        height: outConfig.value.height,
    };
});

const editGroupConfig = reactive({
    x: imageConfig.x - 60,
    y: imageConfig.y - 50,
    width: 150,
    height: 40,
    cornerRadius: 20,
    fill: "gray",
    draggable: false,
});

const deleteImage = new window.Image();
deleteImage.src = "/image/Test/element-delete.svg";
const iconDeleteConfig = reactive({
    x: imageConfig.x - 50,
    y: imageConfig.y - 40,
    radius: 10,
    draggable: false,
    image: deleteImage,
});

const copyImage = new window.Image();
copyImage.src = "/image/Test/element-copy.svg";
const iconCopyConfig = reactive({
    x: iconDeleteConfig.x + 50,
    y: imageConfig.y - 40,
    radius: 10,
    draggable: false,
    image: copyImage,
});

const editImage = new window.Image();
editImage.src = "/image/Test/element-pencil.svg";

const iconEditConfig = reactive({
    x: iconCopyConfig.x + 50,
    y: imageConfig.y - 40,
    radius: 10,
    draggable: false,
    image: editImage,
});

const isEditing = ref(false);

const groupRef = ref(null);
const imageRef = ref(null);
const inputRef = ref(null);
const transformerRef = ref(null);

const stageRef: Ref = inject("stageRef");

function handleDragMove(e: any) {
    showEditGroup();
    const node = e.target;
    imageConfig.x = node.x();
    imageConfig.y = node.y();
    iconDeleteConfig.x = imageConfig.x - 50; // 更新圖示的位置
    iconCopyConfig.x = iconDeleteConfig.x + 50;
    iconEditConfig.x = iconCopyConfig.x + 50;
    editGroupConfig.x = imageConfig.x - 60;

    iconEditConfig.y =
        iconCopyConfig.y =
        iconDeleteConfig.y =
            imageConfig.y - 40;

    editGroupConfig.y = imageConfig.y - 50;
}

function finishEditing() {
    isEditing.value = false;
    groupRef.value.getNode().show();
    imageRef.value.getNode().show();
    document.body.removeChild(inputRef.value);
    transformerRef.value.getNode().nodes([imageRef.value.getNode()]);
}

onClickOutside(inputRef, (event: any) => {
    if (isEditing.value) {
        finishEditing();
    }
});

const isInside = ref(true);

const showEditGroup = () => {
    groupRef.value.getNode().show();
    transformerRef.value.getNode().nodes([imageRef.value.getNode()]);
};

const hideEditGroup = () => {
    groupRef.value.getNode().hide();
    transformerRef.value.getNode().nodes([]);
    document.body.removeEventListener("click", hideEditGroup);
    emits("leave");
};
const mouseIn = () => {
    isInside.value = true;
    document.body.removeEventListener("click", hideEditGroup);
};

const mouseLeave = () => {
    isInside.value = false;
    document.body.addEventListener("click", hideEditGroup);
};

const deleteClick = () => {
    emits("deleteNode");
};

onMounted(() => {
    groupRef.value.getNode().hide();
});

const init = () => {};
init();
</script>
