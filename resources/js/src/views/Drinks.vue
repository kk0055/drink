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
                        <div class="flex items-center justify-center">
                            <div class="flex space-x-2 justify-center">
                                <button @click="togglePrefectureModal">
                                    <div
                                        class="border-2 bg-black border-gray-800 rounded-lg px-3 py-2 text-white cursor-pointer hover:bg-gray-800 hover:text-white"
                                    >
                                        都道府県から探す
                                    </div>
                                </button>
                                     <button @click="toggleTasteModal">
                                    <div
                                        class="border-2 bg-black border-gray-800 rounded-lg px-3 py-2 text-white cursor-pointer hover:bg-gray-800 hover:text-white"
                                    >
                                        好みから探す
                                    </div>
                                </button>
                            </div>
                   
                        </div>
                    </div>
                    <template v-if="showPrefectureModal">
                        <PrefectureModal
                            @execute-method="executeMethod"
                            :prefectures="prefectures"
                        />
                    </template>

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
import PrefectureModal from "../../components/PrefectureModal";
import LandingPage from "../../components/LandingPage";
import Footer from "../../components/Footer";
import prefectures from "../../Libraries/prefectures.js";
export default {
    components: {
        LandingPage,
        DrinkItem,
        PrefectureModal,
        Footer
    },
    props: {
        // drinks: Array
    },
    data: () => ({
        drinks: [],
        loading: true,
        showPrefectureModal: false,
        showTasteModal: false,
        prefectures: {}
    }),
    async created() {
        await Promise.all([this.getDrinks()]);
        this.prefectures = prefectures.prefectures;
        this.prefectures.unshift({
            code: 0,
            name: "全部"
        });
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
        },
        togglePrefectureModal() {
            this.showPrefectureModal = !this.showPrefectureModal;
        },
        toggleTasteModal() {
            this.showTasteModal = !this.showTasteModal;
        },
        async executeMethod(val) {
            //   this.showModal = false;
            if (val) {
                await axios
                    .get("/api/drinks", {
                        params: {
                            prefecture: val,
                            with: "comments"
                        }
                    })
                    .then(response => {
                        if (response.data) {
                            this.drinks = response.data;
                        } else {
                            return;
                        }
                    })
                    .catch(function(error) {
                        console.log(error);
                    });

                this.loading = false;
                this.showPrefectureModal = false;
                console.log(val);
            } else {
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
                this.showPrefectureModal = false;
            }
        }
    }
};
</script>
