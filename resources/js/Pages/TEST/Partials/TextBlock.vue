<template>
    <v-group @mouseenter="mouseIn" @mouseleave="mouseLeave">
        <v-text
            ref="textRef"
            :config="outConfig"
            @dragmove="handleDragMove"
            @click="showEditGroup"
        />
        <!-- 筆圖示 -->
        <v-group ref="groupRef">
            <v-rect :config="editGroupConfig" />
            <v-image :config="iconEditConfig" @click="editClick" />
            <v-image :config="iconCopyConfig" @click="copyClick" />
            <v-image :config="iconDeleteConfig" @click="deleteClick" />
        </v-group>
        <v-transformer ref="transformerRef" />
    </v-group>

    <input
        ref="inputRef"
        v-model="outConfig.text"
        class="absolute border-none border-black p-0 text-[24px] shadow-none ring-0 focus:border-none focus:ring-0"
        @keyup.enter="finishEditing"
        :style="inputConfig"
    />
</template>
<script setup lang="ts">
import { ref, reactive, inject, Ref, onMounted, computed } from "vue";
import { onClickOutside } from "@vueuse/core";

interface propsType {}

interface outConfigType {
    fontFamily: string | null;
    color: string | null;
    zIndex: number;
    fill: string;
    x: number;
    y: number;
    text: string;
    fontSize: number;
    draggable: boolean;
}

const props = defineProps<propsType>();

const outConfig = defineModel<outConfigType>("config");

const emits = defineEmits(["deleteNode", "clickOn", "leave", "copyDom"]);

const editGroupConfig = reactive({
    x: outConfig.value.x - 60,
    y: outConfig.value.y - 50,
    width: 150,
    height: 40,
    cornerRadius: 20,
    fill: "gray",
    draggable: false,
});

const deleteImage = new window.Image();
deleteImage.src = "/image/Test/element-delete.svg";
const iconDeleteConfig = reactive({
    x: outConfig.value.x - 50,
    y: outConfig.value.y - 40,
    radius: 10,
    draggable: false,
    image: deleteImage,
});

const copyImage = new window.Image();
copyImage.src = "/image/Test/element-copy.svg";
const iconCopyConfig = reactive({
    x: iconDeleteConfig.x + 50,
    y: outConfig.value.y - 40,
    radius: 10,
    draggable: false,
    image: copyImage,
});

const editImage = new window.Image();
editImage.src = "/image/Test/element-pencil.svg";

const iconEditConfig = reactive({
    x: iconCopyConfig.x + 50,
    y: outConfig.value.y - 40,
    radius: 10,
    draggable: false,
    image: editImage,
});

const isEditing = ref(false);

const groupRef = ref(null);
const textRef = ref(null);
const inputRef = ref(null);
const transformerRef = ref(null);

const inputConfig = reactive({
    top: "0",
    left: "0",
    width: "0",
    Position: "absolute",
});

const stageRef: Ref = inject("stageRef");

function handleDragMove(e: any) {
    showEditGroup();
    const node = e.target;
    outConfig.value.x = node.x();
    outConfig.value.y = node.y();
    iconDeleteConfig.x = outConfig.value.x - 50; // 更新圖示的位置
    iconCopyConfig.x = iconDeleteConfig.x + 50;
    iconEditConfig.x = iconCopyConfig.x + 50;
    editGroupConfig.x = outConfig.value.x - 60;

    iconEditConfig.y =
        iconCopyConfig.y =
        iconDeleteConfig.y =
            outConfig.value.y - 40;

    editGroupConfig.y = outConfig.value.y - 50;
}

function editClick() {
    //隱藏
    groupRef.value.getNode().hide();
    textRef.value.getNode().hide();

    //抓位置
    const textPos = textRef.value.getNode().getAbsolutePosition();
    const stagePos = stageRef.value
        .getNode()
        .container()
        .getBoundingClientRect();

    //setInputStyle
    const style = {
        x: stagePos.left + textPos.x,
        y: stagePos.top + textPos.y,
        width: textRef.value.getNode().width() + 10,
    };

    inputConfig.top = style.y + "px";
    inputConfig.left = style.x + "px";
    inputConfig.width = "auto";

    document.body.appendChild(inputRef.value);
    inputRef.value.focus();

    transformerRef.value.getNode().nodes([]);

    setTimeout(() => {
        isEditing.value = true;
    }, 100);
}

function finishEditing() {
    isEditing.value = false;
    groupRef.value.getNode().show();
    textRef.value.getNode().show();
    document.body.removeChild(inputRef.value);
    transformerRef.value.getNode().nodes([textRef.value.getNode()]);
}

onClickOutside(inputRef, (event: any) => {
    if (isEditing.value) {
        finishEditing();
    }
});

const isInside = ref(true);

const showEditGroup = () => {
    groupRef.value.getNode().show();
    transformerRef.value.getNode().nodes([textRef.value.getNode()]);
    emits("clickOn");
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

const copyClick = () => {
    emits("copyDom");
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
