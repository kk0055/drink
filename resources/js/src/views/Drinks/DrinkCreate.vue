<template>
    <div>
      
        <div
        class="w-full h-auto overflow-scroll block h-screen bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-4 flex items-center justify-center"
    >      
        <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
      
        <div id="toast-success" class="flex items-center p-2 mb-4 w-full max-w-xs text-gray-500 bg-white rounded-lg shadow dark:text-gray-400 dark:bg-gray-800" role="alert">
    <div class="inline-flex flex-shrink-0 justify-center items-center w-8 h-8 text-green-500 bg-green-100 rounded-lg dark:bg-green-800 dark:text-green-200">
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M16.707 5.293a1 1 0 010 1.414l-8 8a1 1 0 01-1.414 0l-4-4a1 1 0 011.414-1.414L8 12.586l7.293-7.293a1 1 0 011.414 0z" clip-rule="evenodd"></path></svg>
        <span class="sr-only">Check icon</span>
    </div>
    <div class="ml-3 text-sm font-normal">Item created successfully.</div>
    <button type="button" class="ml-auto -mx-1.5 -my-1.5 bg-white text-gray-400 hover:text-gray-900 rounded-lg focus:ring-2 focus:ring-gray-300 p-1.5 hover:bg-gray-100 inline-flex h-8 w-8 dark:text-gray-500 dark:hover:text-white dark:bg-gray-800 dark:hover:bg-gray-700" data-dismiss-target="#toast-success" aria-label="Close">
        <span class="sr-only">Close</span>
        <svg aria-hidden="true" class="w-5 h-5" fill="currentColor" viewBox="0 0 20 20" xmlns="http://www.w3.org/2000/svg"><path fill-rule="evenodd" d="M4.293 4.293a1 1 0 011.414 0L10 8.586l4.293-4.293a1 1 0 111.414 1.414L11.414 10l4.293 4.293a1 1 0 01-1.414 1.414L10 11.414l-4.293 4.293a1 1 0 01-1.414-1.414L8.586 10 4.293 5.707a1 1 0 010-1.414z" clip-rule="evenodd"></path></svg>
    </button>
</div>
            <div
                class="sm:text-3xl text-2xl font-semibold items-center justify-center text-center text-sky-600  mb-12"
            >
                <img :src="'/images/logo.png'" alt="" width="50x" />
                <!-- Registration Form  -->
            </div>

            <!-- <div
                class="search-text flex flex-col w-full items-center  px-6 tracking-wide "
            >
                <h2 class="text-red-500" role="alert">
                    俺の飲んだもの
                </h2>
            </div> -->
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
                        class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 mt-4"
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
                            :value="prefecture.name"
                            >{{ prefecture.name }}</option
                        >
                    </select>
                </div>
                <div>
                    <input
                        v-model="data.place"
                        type="text"
                        class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 my-4"
                        placeholder="見つけた店 or 場所"
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
                    <input
                        v-model="data.price"
                        type="text"
                        class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 my-4"
                        placeholder="値段"
                    />
                </div>
                <div>
                    <p>評価</p>
                    <div width="20px">
                        <star-rating
                            v-model="data.score"
                            :item-size="20"
                        ></star-rating>
                    </div>
                </div>
                <div class="flex justify-center mt-8">
                    <div class="max-w-2xl rounded-lg shadow-xl bg-gray-50">
                        <div class="m-4">
                            <label class="inline-block mb-2 text-gray-500"
                                >File Upload</label
                            >
                            <div
                                class="flex items-center justify-center w-full"
                            >
                                <label
                                    class="flex flex-col w-full h-32 border-4 border-blue-200 border-dashed hover:bg-gray-100 hover:border-gray-300"
                                >
                                    <div
                                        class="flex flex-col items-center justify-center-box "
                                        v-if="imageUrl"
                                    >
                                        <img
                                            class="h-32"
                                            width="298px"
                                            v-bind:src="imageUrl"
                                             />
                                    </div>
                                    <div
                                        v-else
                                        class="flex flex-col items-center justify-center pt-7"
                                    >
                                        <svg
                                            xmlns="http://www.w3.org/2000/svg"
                                            class="w-8 h-8 text-gray-400 group-hover:text-gray-600"
                                            fill="none"
                                            viewBox="0 0 24 24"
                                            stroke="currentColor"
                                        >
                                            <path
                                                stroke-linecap="round"
                                                stroke-linejoin="round"
                                                stroke-width="2"
                                                d="M7 16a4 4 0 01-.88-7.903A5 5 0 1115.9 6L16 6a5 5 0 011 9.9M15 13l-3-3m0 0l-3 3m3-3v12"
                                            />
                                        </svg>
                                        <p
                                            class="pt-1 text-sm tracking-wider text-gray-400 group-hover:text-gray-600"
                                        >
                                            Attach a file
                                        </p>
                                    </div>
                                    <input
                                        type="file"
                                        class="opacity-0"
                                        name="avatar"
                                        ref="preview"
                                        @change="selectedFile"
                                    />
                                </label>
                            </div>
                        </div>
                        <!-- <div class="flex justify-center p-2">
            <button class="w-full px-4 py-2 text-white bg-blue-500 rounded shadow-xl">Create</button>
        </div> -->
                    </div>
                </div>
                <div class="flex justify-center my-6">
                    <button
                        class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-blue-400 text-lg font-semibold shadow"
                        @click="postData"
                    >
                        投稿
                    </button>
                </div>
            </div>
        </div>
    </div>
    </div>
</template>
<script>
import prefectures from "../../../Libraries/prefectures.js";
// import AwesomeVueStarRating from "awesome-vue-star-rating";
// import StarRating from "../../../components/StarRating";
import { StarRating } from "vue-rate-it";
export default {
    data: () => ({
        data: {},
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
        disabled: false,
        imageUrl: "",
        files: []
    }),
    components: {
        // AwesomeVueStarRating,
        StarRating
    },
    created() {
        this.prefectures = prefectures.prefectures;
    },
    computed: {
        getPrefectures() {},
        photo() {
            return 
        }
    },
    methods: {
        async postData() {
            const config = {
                headers: {
                    "content-type": "multipart/form-data"
                }
            };
            let formData = new FormData();
            formData.append('image', this.files);
            formData.append('name', this.data.name);
            formData.append('prefecture', this.data.prefecture);
            formData.append('place', this.data.place);
            formData.append('map_url', this.data.map_url);
            formData.append('review', this.data.review);
            formData.append('score', this.data.score);
            formData.append('price', this.data.price);

            await axios
                .post("/api/drinks", formData, config)
                .then(rs => {
                    console.log(rs.data);
                })
                .catch(function(error) {
                    console.log(error);
                });
            this.loading = false;
        },
        show() {
        },
         selectedFile(e) {
            const file = this.$refs.preview.files[0];
            this.imageUrl = URL.createObjectURL(file);
           
                e.preventDefault();
                let files = e.target.files;
                 console.log(files[0])
                this.files = files[0];
            },
    }
};
</script>
<style></style>
