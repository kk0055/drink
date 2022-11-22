<template>
    <div>
        <div>
            <div>
                <div class="bg-indigo-900 relative overflow-hidden h-screen">
                    <img
                        src="/images/background2.png"
                        class="absolute h-full w-full  object-cover"
                    />
                    <!-- 背景画像に被せる色 -->
                    <div class="inset-0 bg-black opacity-95 absolute"></div>
                    <div
                        class="container mx-auto px-6 md:px-12 relative z-10 flex items-center py-32 xl:py-40"
                    >
                        <div
                            class="w-full font-mono flex flex-col items-center relative z-10"
                        >
                            <h1
                                class="font-extrabold text-5xl md:text-7xl mb-24 text-white animate-bounce "
                            >
                                俺の飲んだもの
                            </h1>
                            <p
                                class="text-white w-2/3"
                                style="font-family: 'Stick', sans-serif"
                            >
                                街を歩いている時にたまたま出会った、見たこともない面白いパッケージの飲み物、ビックリするほど美味しいドリンク。君が知らないだけで街角の自販機やコンビニ、スーパー、居酒屋、近所の喫茶店...などなど新しい発見はどこにでもある。そんな偶然を記録していこう。
                            </p>
                            <p
                                class="font-extrabold text-2xl my-20 text-white "
                            >
                                <span class=""
                                    >ところで、君は今日何を飲んだ?</span
                                >
                            </p>
                        </div>
                    </div>
                </div>

                <section class="bg-white  py-4">
                    <div
                        class="container mx-auto flex items-center flex-wrap pt-1 pb-12"
                    >
            

                        <div
                            v-for="drink in drinks"
                            class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col  inline-block"
                        >
                            <DrinkItem :drink="drink" />
                        </div>
                    </div>

                    <div class="panel-footer">
                        <!-- <favorite-btn
                        :drink={{ $drink->id }}
                        :favorited={{ $drink->favorited() ? 'true' : 'false' }}
                    ></favorite-btn> -->
                    </div>
                </section>
            </div>
            <section class="bg-white py-8">
                <div class="container py-8 px-6 mx-auto">
                    <a
                        class="tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl mb-8"
                        href="#"
                    >
                    </a>
                    <p
                        class="mb-8 "
                        style="font-family: 'RocknRoll One', sans-serif;"
                    >
                        世の中には飲んだことのない飲み物が無数にある。<br />
                        何が美味しいかなんて飲んでみないとわからない。 <br />
                        不味いかもしれない。苦いかもしれない。甘すぎるかもしれない。<br />
                        それでもたまには美味しいものに出会えるよ。たぶん。
                    </p>
                </div>
            </section>

            <footer class="container mx-auto bg-white py-8  border-gray-400">
                <div class="container flex px-3 py-8 ">
                    <div class="w-full mx-auto flex flex-wrap">
                        <div class="flex w-full lg:w-1/2 "></div>
                        <div
                            class="flex w-full lg:w-1/2 lg:justify-end lg:text-right"
                        ></div>
                    </div>
                </div>
            </footer>
        </div>
    </div>
</template>

<script>
import DrinkItem from "../../components/DrinkItem";
export default {
    components: {
        DrinkItem
    },
    data: () => ({}),
    props: {
        drinks: Array
    }
};
</script>
