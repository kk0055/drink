<template>
    <div
        v-if="loading"
        class="flex justify-center items-center"
        style="height: 90vh"
    >
        <div
            class="spinner-border animate-spin inline-block w-8 h-8 border-4 rounded-full text-blue-400"
            role="status"
        ></div>
    </div>
    <div v-else>
        <div>
            <div>
                <div class="bg-indigo-900 relative overflow-hidden h-screen">
                    <img
                        src="/images/background2.png"
                        class="absolute h-full w-full object-cover"
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

                <section class="bg-white py-4">
                    <div
                        class="container mx-auto flex items-center flex-wrap pt-1 pb-12 "
                    >
                        <div
                            v-for="drink in drinks"
                            class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col  inline-block sm:-m-4 -mx-4 md:mx-0"
                        >
                            <DrinkItem :drink="drink" :drinks="drinks" />
                        </div>
                    </div>
                    <!-- <favorite-btn
                        :drink={{ $drink->id }}
                        :favorited={{ $drink->favorited() ? 'true' : 'false' }}
                    ></favorite-btn> -->
                </section>
            </div>
            <Footer />
        </div>
    </div>
</template>

<script>
import DrinkItem from "../../components/DrinkItem";
import Footer from "../../components/Footer";
export default {
    components: {
        DrinkItem,
        Footer
    },
    props: {
        // drinks: Array
    },
    data: () => ({
        drinks: [],
        loading: true
    }),
    async created() {
        await Promise.all([this.getDrinks()]);
    },
    methods: {
        async getDrinks() {
            await axios
                .get("/api/drinks", {
                    params: {
                        with: "comments"
                    }
                })
                .then(response => {
                    this.drinks = response.data;
                })
                .catch(function(error) {
                    console.log(error);
                });

            this.loading = false;
        }
    }
};
</script>
