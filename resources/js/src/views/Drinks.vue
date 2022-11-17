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
                        <div class="w-full z-30 top-0 px-6 py-1">
                            <div
                                class="w-full container mx-auto flex  items-center justify-end mt-0 px-2 py-3"
                            >
                                <div
                                    class="flex items-center relative mb-6"
                                    id="store-nav-content"
                                >
                                    <div
                                        class="absolute inset-y-0 left-0 flex items-center pl-3 pr-10 pointer-events-none"
                                    >
                                        <i class="fas fa-search "> </i>
                                    </div>
                                    <input
                                        type="text"
                                        name="query"
                                        class="block  text-sm rounded-full w-64 p-4 pl-2 py-1 focus:outline-none border border-gray-300 border-b focus:shadow-outline "
                                        placeholder="  Search"
                                    />
                                    <!-- </form> -->
                                </div>
                            </div>
                        </div>

                        <div
                            v-for="drink in drinks"
                            class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col  inline-block"
                        >
                            <DrinkItem :drink="drink" />
                        </div>
                    </div>

                    <!-- <div class="rounded overflow-hidden border ">
                <a href="">  

                <img :src="drink.image" alt="pic"  class="item-image hover:opacity-75 transition ">
                    <div class="pt-3 flex items-center justify-between">
                        <p class="drink-name">{{ drink.name }}</p>
                   
                    </div>
                    <p class="pt-1 text-gray-900 ">
                        <i class="fas fa-star text-yellow-300"></i>
                        {{ drink.score }}</p>
                    <div class="body-box ">
                       <p class="drink-place">買った店：{{ drink.prefecture }}</p>
                        <p class="drink-place">買った店：{{ drink.place }}</p>
                    <p class="mt-2 drink-text">{{ drink.review }}</p>
                    <p class="mt-2 drink-text">{{ drink.map_url }}</p>
                    <p class="mt-2 drink-text">{{ drink.price }}</p>
                    </div>
                    </a>
          </div> -->
                    <div class="panel-footer">
                        <!-- <favorite-btn
                        :drink={{ $drink->id }}
                        :favorited={{ $drink->favorited() ? 'true' : 'false' }}
                    ></favorite-btn> -->
                    </div>

                    <!--    
            {{ $drinks->links() }} -->
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
