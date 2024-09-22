<template>
    <div
        class="flex w-full max-w-[1440px] flex-row justify-center gap-[32px] px-[100px] py-9 lg:gap-[100px]"
    >
        <img
            class="w-[70vw] max-w-[529px] lg:w-[33vw]"
            :src="asset('demo-cake.svg')"
        />
        <div class="flex min-w-[300px] max-w-[550px] flex-1 flex-col gap-12">
            <div>
                <div
                    class="pb-3 text-[42px] font-medium leading-[50px] text-[#3a3a3a]"
                >
                    藍莓香草蛋糕
                </div>
                <div class="text-2xl font-medium text-[#9F9F9F]">760 NTD</div>
            </div>
            <div class="flex flex-col gap-4">
                <div class="flex flex-row gap-5">
                    <div class="flex flex-row gap-1.5">
                        <img
                            v-for="item in Math.floor(4.2)"
                            :src="asset('element-star.svg')"
                        />
                        <img
                            v-if="Math.floor(4.2) !== 4.2"
                            class="w-[10px] object-cover object-left"
                            :src="asset('element-star.svg')"
                        />
                        <div
                            v-for="item in Math.floor(5 - 4.2)"
                            class="size-5"
                        />
                    </div>
                    <div class="h-full w-[1px] bg-[#9F9F9F]" />
                    <div class="text-sm text-[#9F9F9F]">5 Customer Review</div>
                </div>
                <div class="text-sm text-[#3a3a3a]">
                    OMU生鮮奶油、日式巧克力海綿蛋糕、72%法國生巧克力、覆盆子奶餡、手製覆盆子醬
                </div>
                <div class="h-[1px] w-full bg-[#d9d9d9]" />
                <div class="text-sm text-[#3a3a3a]">
                    香濃巧克力香緹搭配酸甜風味的手工天然覆盆子醬、覆盆子奶餡
                    <br />並以嚴選72%頂級莊園法國生巧克力內餡
                    <br />日本純生OMU鮮奶油搭配出黃金比例
                    <br />巧克力的香濃莓果的酸甜
                    <br />讓每一個層次都融合的完美無缺
                </div>
                <div class="text-sm text-[#9F9F9F]">尺寸</div>
                <div class="flex flex-row gap-4">
                    <ButtonGroup :items="sizeOptions" />
                </div>
            </div>

            <div class="flex flex-row gap-3">
                <UpDownInput v-model="num" />
                <button
                    class="rounded-xl bg-[#b88e2f] px-10 py-5 text-xl text-white"
                >
                    立即購買
                </button>
                <button
                    class="rounded-xl border-2 border-[#9F9F9F] px-10 py-5 text-xl text-[#3a3a3a]"
                >
                    新增至購物車
                </button>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ref } from "vue";

import asset from "@/asset";
import ButtonGroup from "@/Components/ButtonGroup.vue";
import UpDownInput from "@/Components/UpDownInput.vue";

const sizeOptions = ref(["7寸", "10寸", "12寸"]);

const num = ref(0);
</script>
