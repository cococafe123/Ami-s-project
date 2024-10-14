<template>
    <label class="like">
        <input :disabled="isLikeDisabled" type="checkbox" @click="click" />
        <div class="hearth" />
    </label>
</template>
<script lang="ts" setup>
import { ref } from "vue";

const emits = defineEmits(["clickLike"]);

const isLikeDisabled = ref(false);
const inputValue = ref(false);

const click = () => {
    inputValue.value = !inputValue.value;
    if (inputValue.value) {
        emits("clickLike", 1);
    } else {
        emits("clickLike", -1);
    }
    isLikeDisabled.value = true;
    // emits
    //三秒內不能再按
    setTimeout(() => {
        isLikeDisabled.value = false;
    }, 1000);
};
</script>
<style lang="scss">
:root {
    --size: 32px;
    --frames: 62;
}

input {
    display: none;
}

.like {
    display: block;
    width: var(--size);
    height: var(--size);
    cursor: pointer;
    border-radius: 999px;
    overflow: visible;
    -webkit-tap-highlight-color: rgba(0, 0, 0, 0);
    -webkit-tap-highlight-color: transparent;
}

.hearth {
    background-image: url("https://assets.codepen.io/23500/Hashflag-AppleEvent.svg");
    background-size: calc(var(--size) * var(--frames)) var(--size);
    background-repeat: no-repeat;
    background-position-x: calc(var(--size) * (var(--frames) * -1 + 2));
    background-position-y: calc(var(--size) * 0.02);
    width: var(--size);
    height: var(--size);
}

input:checked + .hearth {
    animation: like 1s steps(calc(var(--frames) - 3));
    animation-fill-mode: forwards;
}

@keyframes like {
    0% {
        background-position-x: 0;
    }
    100% {
        background-position-x: calc(var(--size) * (var(--frames) * -1 + 3));
    }
}

@media (hover: hover) {
    .like:hover {
        background-color: #e1255e15;
        .hearth {
            background-position-x: calc(var(--size) * (var(--frames) * -1 + 1));
        }
    }
}

// hashflag-gallery - dribbble - twitter
.hashflag {
    position: fixed;
    display: block;
    right: 114px;
    bottom: 20px;
    img {
        display: block;
        height: 28px;
    }
}
.dribbble {
    position: fixed;
    display: block;
    right: 20px;
    bottom: 20px;
    img {
        display: block;
        height: 28px;
    }
}
.twitter {
    position: fixed;
    display: block;
    right: 64px;
    bottom: 14px;
    svg {
        width: 32px;
        height: 32px;
        fill: #1da1f2;
    }
}
</style>
