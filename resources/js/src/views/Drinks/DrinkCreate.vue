<template>
    <div
        class="w-full h-auto overflow-scroll block h-screen bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-4 flex items-center justify-center"
    >
        <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
            <div
                class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12"
            >
                <!-- Registration Form  -->
            </div>
            <div class="">
                <div>
                    <input
                        type="text"
                        class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500"
                        placeholder="飲んだもの"
                        v-model="data.name"
                    />
                </div>
                <div>
                    <input
                        v-model="data.review"
                        type="text"
                        class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 my-8"
                        placeholder="感想"
                    />
                </div>
                <div class="mt-4">
                    <label
                        for="prefectures"
                        class="block mb-2 text-sm font-medium text-gray-500 dark:text-gray-400"
                        >見つけた県</label
                    >
                    <select
                        v-model="data.prefecture"
                        id="prefectures"
                        class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                    >
                        <option
                            v-for="prefecture in prefectures"
                            :value="prefecture.code"
                            >{{ prefecture.name }}</option
                        >
                    </select>
                </div>
                <div>
                    <input
                        v-model="data.place"
                        type="text"
                        class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 my-4"
                        placeholder="見つけた店、場所"
                    />
                </div>
                <div>
                    <input
                        v-model="data.map_url"
                        type="text"
                        class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 my-4"
                        placeholder="Google mapのURL"
                    />
                </div>
                <div>
                    <p>評価</p>
                    <AwesomeVueStarRating
                        v-model="data.score"
                        :star="this.star"
                        :disabled="this.disabled"
                        :maxstars="this.maxstars"
                        :starsize="this.starsize"
                        :hasresults="this.hasresults"
                        :hasdescription="this.hasdescription"
                        :ratingdescription="this.ratingdescription"
                    />
                </div>

                <div class="flex justify-center my-6">
                    <button
                        class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold "
                    >
                        投稿
                    </button>
                </div>
            </div>
        </div>
    </div>
</template>
<script>
import prefectures from "../../../Libraries/prefectures.js";
import AwesomeVueStarRating from "awesome-vue-star-rating";
export default {
    data: () => ({
        data: [],
        loading: true,
        prefectures: {},
        star: 5,
        ratingdescription: [
            {
                text: "Poor",
                class: "star-poor"
            },
            {
                text: "Below Average",
                class: "star-belowAverage"
            },
            {
                text: "Average",
                class: "star-average"
            },
            {
                text: "Good",
                class: "star-good"
            },
            {
                text: "Excellent",
                class: "star-excellent"
            }
        ],
        hasresults: true,
        hasdescription: true,
        starsize: "lg", //[xs,lg,1x,2x,3x,4x,5x,6x,7x,8x,9x,10x],
        maxstars: 5,
        disabled: false
    }),
    components: {
        AwesomeVueStarRating
    },
    created() {
        this.prefectures = prefectures.prefectures;
    },
    computed: {
        // getPrefectures() {
        //     this.prefectures = prefectures.prefectures;
        // }
    },
    methods: {
        async getData() {
            await axios
                .post("/api/drinks", {})
                .then(response => {
                    // .then(response => console.log(res))
                })
                .catch(function(error) {
                    console.log(error);
                });
            this.loading = false;
        }
    }
};
</script>
