<template>
    <div class="padding-content bg-white px-4 py-[100px] sm:px-8">
        <div class="text-5xl font-bold text-[#2c2c2c]">行銷故事</div>

        <div class="flex w-full flex-col items-center gap-6 pt-9">
            <div
                class="flex w-full flex-row gap-4 rounded-3xl border border-[#d9d9d9] px-8 pb-8 pt-6"
            >
                <img
                    :src="asset('Arch/arch-story1.png')"
                    class="size-[240px] rounded-3xl"
                />
                <div class="flex flex-col gap-2 sm:flex-1">
                    <div class="flex flex-row items-start gap-3">
                        <div class="text-2xl font-semibold text-[#1d91d7]">
                            電商知識
                        </div>
                        <div class="font-base text-xl text-[#757575]">
                            2024.09.02
                        </div>
                    </div>
                    <div class="text-3xl font-semibold text-[#1e1e1e]">
                        O2O是什麼？3步驟打造你的線上線下王國！
                    </div>
                    <div
                        class="font-base hidden text-xl text-[#1e1e1e] sm:block"
                    >
                        隨著網路科技的發展，傳統的商業模式正在悄悄地改變。你是否聽過「O2O」這個詞呢？別擔心，今天就讓小編帶你一探究竟，什麼是O2O，以及如何透過O2O打造你的線上線下王國！
                    </div>
                    <div class="pt-2">
                        <Link
                            :href="route('ArchBlog')"
                            class="flex flex-row gap-2 py-3 pr-3"
                        >
                            <div class="text-[16px] leading-4 text-[#303030]">
                                繼續閱讀
                            </div>
                            <img :src="asset('Arch/element-continue.svg')" />
                        </Link>
                    </div>
                </div>
            </div>

            <button
                class="rounded-lg bg-[#1D91D7] px-7 py-4 text-base text-[#F5F5F5]"
            >
                更多案例
            </button>
        </div>
    </div>
</template>
<script lang="ts" setup>
import asset from "@/asset";
import { Link } from "@inertiajs/vue3";
</script>
