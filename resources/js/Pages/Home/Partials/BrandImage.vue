<template>
    <div class="flex w-full content-center justify-center bg-[#FAF3EA]">
        <div
            class="flex w-full max-w-[1440px] flex-row justify-between gap-10 px-[100px] py-[50px]"
        >
            <div class="flex flex-row">
                <img :src="asset('element-high-quality-food.svg')" />
                <div class="flex flex-col">
                    <div class="text-2xl font-semibold text-[#242424]">
                        高品質食材
                    </div>
                    <div class="text-xl text-[#898989]">
                        嚴選新鮮水果、頂級巧克力、天然香料等
                    </div>
                </div>
            </div>
            <div class="flex flex-row">
                <img :src="asset('element-made-by-hand.svg')" />
                <div class="flex flex-col">
                    <div class="text-2xl font-semibold text-[#242424]">
                        手工製作
                    </div>
                    <div class="text-xl text-[#898989]">
                        每一個蛋糕都是由甜點師傅精心製作
                    </div>
                </div>
            </div>
            <div class="flex flex-row">
                <img :src="asset('element-beautiful-packaging.svg')" />
                <div class="flex flex-col">
                    <div class="text-2xl font-semibold text-[#242424]">
                        精美包裝
                    </div>
                    <div class="text-xl text-[#898989]">
                        讓您的蛋糕成為一份精緻的禮物
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import asset from "@/asset";
</script>
