<template>
    <div>
        <div
            class="w-full h-auto overflow-scroll block h-screen bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-4 flex items-center justify-center"
        >
            <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
                <div
                    class="flex sm:text-3xl text-2xl font-semibold items-center justify-center text-center text-sky-600  mb-12"
                >
                    <img :src="'/images/logo.png'" alt="" width="50x" />
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
                            @input="$v.data.name.$touch()"
                        />
                        <span
                            v-if="$v.data.name.$error"
                            class="mt-2"
                            :class="{ error: $v.data.name.$error }"
                            >Oops!!!!! 書いてね!</span
                        >
                    </div>
                    <div>
                        <input
                            v-model="data.review"
                            type="text"
                            class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 mt-4"
                            placeholder="感想"
                            @input="$v.data.review.$touch()"
                        />
                        <span
                            v-if="$v.data.review.$error"
                            class="mt-2"
                            :class="{ error: $v.data.review.$error }"
                            >Oops!!!!! 書いてね!</span
                        >
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
                            class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            @input="$v.data.prefecture.$touch()"
                        >
                            <option
                                v-for="prefecture in prefectures"
                                :value="prefecture.name"
                                >{{ prefecture.name }}</option
                            >
                        </select>
                        <span
                            v-if="$v.data.prefecture.$error"
                            class="mt-2"
                            :class="{ error: $v.data.prefecture.$error }"
                            >Oops!!!!! 選択してね!</span
                        >
                    </div>
                    <div>
                        <input
                            v-model="data.place"
                            type="text"
                            class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 mt-4"
                            placeholder="見つけた店 or 場所"
                            @input="$v.data.place.$touch()"
                        />
                        <span
                            v-if="$v.data.place.$error"
                            class="mt-2"
                            :class="{ error: $v.data.place.$error }"
                            >Oops!!!!! 書いてね!</span
                        >
                    </div>
                    <div>
                        <input
                            v-model="data.map_url"
                            type="text"
                            class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 mt-4"
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
                                :increment="0.5"
                                @input="$v.data.place.$touch()"
                            ></star-rating>
                            <span
                                v-if="$v.data.score.$error"
                                class="mt-2"
                                :class="{ error: $v.data.score.$error }"
                                >Oops!!!!! 選択してね!</span
                            >
                        </div>
                    </div>
                    <div class="flex justify-center mt-8 ">
                        <div class="max-w-2xl rounded-lg shadow-xl bg-gray-50">
                            <div class="m-2 md:m-4">
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
                    <!-- Tags -->
                    <!-- <form action="#" class="mt-8">
                        <div
                            class="flex bg-gray-100 p-1 items-center w-full space-x-2 sm:space-x- rounded border border-gray-500 dark:bg-gray-700 dark:border-gray-300"
                        >
                            <svg
                                xmlns="http://www.w3.org/2000/svg"
                                class="h-6 w-6 opacity-50 dark:text-gray-100 ml-2"
                                fill="none"
                                viewBox="0 0 24 24"
                                stroke="currentColor"
                            >
                                <path
                                    stroke-linecap="round"
                                    stroke-linejoin="round"
                                    stroke-width="2"
                                    d="M7 7h.01M7 3h5c.512 0 1.024.195 1.414.586l7 7a2 2 0 010 2.828l-7 7a2 2 0 01-2.828 0l-7-7A1.994 1.994 0 013 12V7a4 4 0 014-4z"
                                />
                            </svg>
                            <input
                                class="bg-gray-100 outline-none text-sm sm:text-base w-full dark:bg-gray-700 dark:text-gray-200 border-transparent focus:border-transparent focus:ring-0"
                                type="text"
                                placeholder="Add a tag..."
                            />
                        </div>
                    </form> -->
                    <div class="my-3 p-2 flex flex-wrap ">
                        <div class="flex flex-row mr-1" v-for="tag in tags">
                            <input
                                type="checkbox"
                                v-model="selectedTags"
                                :value="tag.id"
                            />
                            <div 
                                class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900 my-1 "
                            >
                                #{{ tag.name }}
                            </div>
                        </div>
                    </div>
                    <div class="flex justify-center my-6">
                        <button
                            class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-blue-400 text-lg font-semibold shadow 
                          "
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
import { StarRating } from "vue-rate-it";
import { required } from "vuelidate/lib/validators";

export default {
    data: () => ({
        data: {},
        loading: true,
        prefectures: {},
        star: 5,
        starsize: "lg", //[xs,lg,1x,2x,3x,4x,5x,6x,7x,8x,9x,10x],
        maxstars: 5,
        disabled: false,
        imageUrl: "",
        files: [],
        tags: [],
        selectedTags: []
    }),
    components: {
        StarRating
    },
    props: {},
    validations: {
        data: {
            name: {
                required
            },
            review: {
                required
            },
            prefecture: {
                required
            },
            place: {
                required
            },
            score: {
                required
            }
        }
    },
    created() {
        this.prefectures = prefectures.prefectures;
        this.getTags();
    },
    computed: {
        // setTags() {
        //     this.data.tag_id.push(this.selectedTags)
        // }
    },
    methods: {
        async postData() {
            this.$v.$touch();
            const config = {
                headers: {
                    "content-type": "multipart/form-data"
                }
            };
            let formData = new FormData();
            formData.append("image", this.files);
            formData.append("name", this.data.name);
            formData.append("prefecture", this.data.prefecture);
            formData.append("place", this.data.place);
            formData.append("map_url", this.data.map_url);
            formData.append("review", this.data.review);
            formData.append("score", this.data.score);
            formData.append("price", this.data.price);

            formData.append("tag_id" , JSON.stringify(this.selectedTags));
            
            if (this.$v.$invalid) {
                console.log("Validation Error");
            } else {
                await axios
                    .post("/api/drinks", formData, config)
                    .then(res => {
                        // console.log(res);
                        this.$toast("投稿完了!", {
                            position: "top-right",
                            timeout: 2000
                            // transition: "fade"
                        });
                        this.loading = false;
                        this.$router.push("/");
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            }
        },
        selectedFile(e) {
            const file = this.$refs.preview.files[0];
            this.imageUrl = URL.createObjectURL(file);

            e.preventDefault();
            let files = e.target.files;
            // console.log(files[0]);
            this.files = files[0];
        },
        async getTags() {
            await axios
                .get("/api/tags")
                .then(res => {
                    console.log(res);
                    this.tags = res.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    }
};
</script>
