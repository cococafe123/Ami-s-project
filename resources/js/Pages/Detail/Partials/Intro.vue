<template>
    <div class="flex w-full justify-center py-12">
        <div
            class="padding-x-max-205 flex w-full max-w-[1440px] flex-col content-center justify-center gap-10"
        >
            <div class="flex flex-row justify-center gap-[52px]">
                <button class="text-2xl font-medium text-[#3a3a3a]">
                    商品介紹
                </button>
                <button class="text-2xl font-medium text-[#3a3a3a]">
                    運送說明
                </button>
                <button class="text-2xl font-medium text-[#3a3a3a]">
                    常見問題
                </button>
            </div>
            <div
                v-if="contentIndex === 0"
                class="flex flex-col gap-4 text-[#9f9f9f]"
            >
                <div class="text-2xl font-semibold">
                    頂級食材，手工製作，每一口都是享受
                </div>
                <div class="text-base font-normal">
                    我們的藍莓香草蛋糕，嚴選來自[產地]的新鮮藍莓，顆顆飽滿多汁，散發著誘人的果香。搭配濃郁香氣的[產地]香草豆莢，手工製成綿密細緻的蛋糕體，層層堆疊出豐富的口感。
                </div>
                <div class="text-base font-normal">
                    視覺饗宴：
                    湛藍的藍莓與金黃的蛋糕體形成鮮明的對比，每一層都精心擺放，宛如一幅藝術品。<br />
                    味覺盛宴：
                    酸甜的藍莓果肉在口中爆開，與香草的溫潤香氣完美融合，每一口都是味蕾的狂歡。<br />
                    口感升級：
                    輕盈的蛋糕體搭配Q彈的藍莓果肉，口感豐富多層次，讓人回味無窮。<br />
                    幸福配方：
                    嚴選頂級食材，無添加人工色素及香料，只為提供您最純粹的美味。
                </div>
                <div class="text-2xl font-semibold">
                    為什麼選擇我們的藍莓香草蛋糕？
                </div>
                <div class="text-base font-normal">
                    新鮮： 藍莓每日現採，確保每一顆都新鮮飽滿。<br />
                    手工： 每一個蛋糕都是甜點師傅用心製作，獨一無二。<br />
                    健康： 使用天然食材，無添加人工添加物，吃得安心。<br />
                    客製化： 我們提供客製化服務，讓您的蛋糕更具獨特性
                </div>
                <div class="text-2xl font-semibold">適合的場合</div>
                <div class="text-base font-normal">
                    生日派對：
                    為摯愛慶生，選擇一款精緻的藍莓香草蛋糕，讓派對更加溫馨。<br />
                    下午茶：
                    邀請好友來家裡品嚐下午茶，這款蛋糕絕對是最佳選擇。<br />
                    送禮：
                    將滿滿的心意透過蛋糕傳遞給對方，是表達心意的最佳方式。
                </div>
            </div>
        </div>
    </div>
</template>
<script lang="ts" setup>
import { ref } from "vue";

const contentIndex = ref(0);
</script>
<style lang="css" scoped>
.padding-x-max-205 {
    padding-right: min(205px, 15vw);
    padding-left: min(205px, 15vw);
}
</style>
