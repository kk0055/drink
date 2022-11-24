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
                <LandingPage />
                <section class="bg-white py-4">
                    <div class="w-full my-4">
                        <div class="flex ">
                            <div class="m-auto flex flex-col gap-6">
                                <div
                                    class="border-2 bg-black border-gray-800 rounded-lg px-3 py-2 text-white cursor-pointer hover:bg-gray-800 hover:text-white"
                                >
                                    都道府県から探す
                                </div>
                            </div>
                        </div>
                    </div>

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
                </section>
            </div>
            <Footer />
        </div>
    </div>
</template>

<script>
import DrinkItem from "../../components/DrinkItem";
import LandingPage from "../../components/LandingPage";
import Footer from "../../components/Footer";
export default {
    components: {
        LandingPage,
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
