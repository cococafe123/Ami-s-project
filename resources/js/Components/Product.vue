<template>
    <Link
        v-if="product"
        class="relative w-[276px]"
        @mouseover="over = true"
        @mouseout="over = false"
        :href="route('detail', { id: 1 })"
    >
        <div class="hover flex flex-col gap-2">
            <img :src="asset(product.img)" />
            <!-- badge:new -->
            <div
                v-if="product.new"
                class="absolute right-6 top-6 flex size-12 content-center justify-center rounded-full bg-[#2fc2ac] text-base text-white"
            >
                New
            </div>
            <!-- badge:sell -->
            <div
                v-if="product.onSell !== 0"
                class="absolute right-6 top-6 flex size-12 content-center justify-center rounded-full bg-[#e97171] text-base text-white"
            >
                -{{ product.onSell }}
            </div>
            <!-- content -->
            <div class="px-4 text-left text-2xl font-bold text-[#3a3a3a]">
                {{ product.name }}
            </div>
            <div class="px-4 text-left text-base font-medium text-[#898989]">
                {{ product.type }}
            </div>
            <div class="px-4 text-left text-xl font-semibold text-[#3a3a3a]">
                {{ product.price }} NTD / {{ product.unit }}
            </div>
        </div>
        <div
            class="absolute left-0 top-0 size-full rounded-lg opacity-80"
            :class="{
                hidden: !over,
                'flex content-center justify-center bg-[#3a3a3a]': over,
            }"
        ></div>
        <div
            class="absolute left-0 top-0 size-full rounded-lg"
            :class="{
                hidden: !over,
            }"
        >
            <div
                class="flex size-full flex-col content-center justify-center gap-6"
            >
                <button
                    class="w-[200px] rounded-xl bg-white py-3"
                    @click.stop="console.log('test:in')"
                >
                    <div
                        class="font-poppins text-base font-semibold text-[#b88e2f]"
                    >
                        新增到購物車
                    </div>
                </button>
                <div
                    class="flex w-[120px] flex-row justify-between self-center"
                >
                    <button
                        class="flex flex-row content-center justify-center gap-1"
                        @click.stop=""
                    >
                        <img
                            class="self-center"
                            :src="asset('element-share.svg')"
                        />
                        <div class="font-poppins font-semibold text-white">
                            分享
                        </div>
                    </button>
                    <button
                        class="flex flex-row justify-center gap-1"
                        @click.stop=""
                    >
                        <img
                            class="self-center"
                            :src="asset('element-like.svg')"
                        />
                        <div class="font-poppins font-semibold text-white">
                            喜歡
                        </div>
                    </button>
                </div>
            </div>
        </div>
    </Link>
    <div v-else class="w-[276px]" />
</template>

<script lang="ts" setup>
import asset from "@/asset";
import { ref } from "vue";
import { Link } from "@inertiajs/vue3";

const props = defineProps({
    product: { type: null },
});

const over = ref(false);
</script>
