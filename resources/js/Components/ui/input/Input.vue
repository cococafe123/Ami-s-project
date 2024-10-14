<script setup>
import { useVModel } from "@vueuse/core";
import { cn } from "@/lib/utils";

const props = defineProps({
    defaultValue: { type: [String, Number], required: false },
    modelValue: { type: [String, Number], required: false },
    class: { type: null, required: false },
});

const emits = defineEmits(["update:modelValue", "enter"]);

const modelValue = useVModel(props, "modelValue", emits, {
    passive: true,
    defaultValue: props.defaultValue,
});

const keyEnter = () => {
    emits("enter");
};
</script>

<template>
    <input
        v-model="modelValue"
        :class="
            cn(
                'flex h-10 w-full rounded-md border border-[#757575] bg-white px-3 py-2 text-sm ring-offset-white file:border-0 file:bg-transparent file:text-sm file:font-medium placeholder:text-slate-500 disabled:cursor-not-allowed disabled:opacity-50 dark:border-slate-800 dark:bg-slate-950 dark:ring-offset-slate-950 dark:placeholder:text-slate-400',
                props.class,
            )
        "
        @keyup.enter="keyEnter"
    />
</template>
