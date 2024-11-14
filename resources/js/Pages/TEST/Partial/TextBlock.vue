<template>
    <v-group @mouseenter="mouseIn" @mouseleave="mouseLeave">
        <v-text
            ref="textRef"
            :config="textConfig"
            @dragmove="handleDragMove"
            @click="showEditGroup"
        />
        <!-- 筆圖示 -->
        <v-group ref="groupRef">
            <v-image :config="iconEditConfig" @click="editClick" />
            <v-image :config="iconCopyConfig" @click="copyClick" />
            <v-image :config="iconDeleteConfig" @click="deleteClick" />
        </v-group>
    </v-group>

    <input
        ref="inputRef"
        v-model="textConfig.text"
        class="absolute border-none border-black p-0 text-[24px] shadow-none ring-0 focus:border-none focus:ring-0"
        @keyup.enter="finishEditing"
        :style="inputConfig"
    />
</template>
<script setup lang="ts">
import { ref, reactive, inject, Ref, onMounted } from "vue";
import { onClickOutside } from "@vueuse/core";

const emits = defineEmits(["deleteNode"]);

const textConfig = reactive({
    x: 50,
    y: 50,
    text: "test",
    fontSize: 24,
    fill: "black",
    draggable: true,
});

const deleteImage = new window.Image();
deleteImage.src = "/image/Test/element-delete.svg";
const iconDeleteConfig = reactive({
    x: textConfig.x - 50,
    y: textConfig.y - 40,
    radius: 10,
    draggable: false,
    image: deleteImage,
});

const copyImage = new window.Image();
copyImage.src = "/image/Test/element-copy.svg";
const iconCopyConfig = reactive({
    x: iconDeleteConfig.x + 50,
    y: textConfig.y - 40,
    radius: 10,
    draggable: false,
    image: copyImage,
});

const editImage = new window.Image();
editImage.src = "/image/Test/element-pencil.svg";

const iconEditConfig = reactive({
    x: iconCopyConfig.x + 50,
    y: textConfig.y - 40,
    radius: 10,
    draggable: false,
    image: editImage,
});

const isEditing = ref(false);

const groupRef = ref(null);
const textRef = ref(null);
const inputRef = ref(null);

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
    textConfig.x = node.x();
    textConfig.y = node.y();
    iconDeleteConfig.x = textConfig.x - 50; // 更新圖示的位置
    iconCopyConfig.x = iconDeleteConfig.x + 50;
    iconEditConfig.x = iconCopyConfig.x + 50;

    iconEditConfig.y =
        iconCopyConfig.y =
        iconDeleteConfig.y =
            textConfig.y - 40;
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

    console.log(style);

    inputConfig.top = style.y + "px";
    inputConfig.left = style.x + "px";
    inputConfig.width = "auto";

    document.body.appendChild(inputRef.value);
    inputRef.value.focus();

    setTimeout(() => {
        isEditing.value = true;
    }, 100);
}

function finishEditing() {
    console.log("test");
    isEditing.value = false;
    groupRef.value.getNode().show();
    textRef.value.getNode().show();
    document.body.removeChild(inputRef.value);
}

onClickOutside(inputRef, (event: any) => {
    if (isEditing.value) {
        finishEditing();
    }
});

const isInside = ref(true);

const showEditGroup = () => {
    groupRef.value.getNode().show();
};

const hideEditGroup = () => {
    groupRef.value.getNode().hide();
    document.body.removeEventListener("click", hideEditGroup);
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
    navigator.clipboard.writeText(textConfig.text);
};

const deleteClick = () => {
    console.log("delete in");

    emits("deleteNode");
};

onMounted(() => {
    groupRef.value.getNode().hide();
});

const init = () => {};
init();
</script>
