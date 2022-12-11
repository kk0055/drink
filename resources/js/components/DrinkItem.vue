<template>
    <div
        class="max-w-sm rounded overflow-hidden border w-full bg-white mx-3 md:mx-0 lg:mx-0"
    >
        <img
            v-if="hideItemDetails"
            class="h-48 md:h-36 w-full object-cover"
            width="300px"
            height="5000px"
            :src="image"
        />
        <!-- <img class="w-full bg-cover p-3" width="300px" height="350px" v-if="$route.name == 'drinks'"  :src="drink.image"> -->
        <img
            v-else
            class="w-full object-center "
            height="400px"
            :src="image"
        />
        <div class="px-3 pb-2">
            <div class="pt-2">
                <h3 class="drink-name text-blue-700">{{ drink.name }}</h3>
                <i class="fas fa-star -ml-1 text-yellow-300"></i>
                {{ drink.score }}
                <!-- <favorite-btn
                    :drink="drink.id"
                    :favorited="drink.favorited ? 'true' : 'false'"
                    class="pl-2"
                ></favorite-btn> -->
            </div>

            <div class="pt-1">
                <div class="mb-2 text-sm">
                    <p class="drink-place">
                        <i class="fas fa-tenge mr-2 text-red-700"></i
                        >{{ drink.prefecture }}
                    </p>
                    <p class="drink-place">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        {{ drink.place }}
                    </p>
                    <p
                        class="mt-2 drink-text "
                        v-if="hideItemDetails"
                    >
                        <i class="far fa-globe mr-2"></i>
                        {{
                            drink.map_url != "undefined"
                                ? drink.map_url
                                : "不明"
                        }}
                    </p>
                    <p class="mt-2" v-else>
                        <i class="far fa-globe mr-2"></i>
                        <a :href="drink.map_url" target="_blank">
                            {{
                                drink.map_url != "undefined"
                                    ? drink.map_url
                                    : "不明"
                            }}</a
                        >
                    </p>
                    <p v-if="drink.price !== '不明'" class="mt-2 drink-text">
                        <i class="fas fa-yen-sign mr-2"></i>{{ drink.price}} 円
                    </p>
                    <p v-else class="mt-2 drink-text">
                        <i class="fas fa-yen-sign mr-2"></i>不明
                    </p>
                    <p
                        class="mt-1 drink-text"
                        v-if="hideItemDetails"
                    >
                        {{ drink.review }}
                    </p>
                    <p class="mt-1" v-else>{{ drink.review }}</p>

                    <div
                        v-if="hideItemDetails
                        "
                        class="mt-1 flex justify-end"
                    >
                        <router-link
                            :to="{
                                name: 'drinkDetails',
                                params: { drinkId: drink.id }
                            }"
                            >...more
                        </router-link>
                    </div>
                    <!-- Tag -->
                    <div
                        v-if="$route.name == 'drinkDetails'"
                        class="my-3 flex flex-wrap "
                    >
                        <div class="flex flex-row" v-for="tag in drink.tags">
                            <div
                                class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900 my-1 mx-1"
                            >
                                #{{ tag.name }}
                            </div>
                        </div>
                    </div>
                    <div class="mt-1 flex justify-between ">
                        <button class="mt-1 flex" v-if="$route.name == 'drinkDetails'">
                            <i
                                @click="showComment = !showComment"
                                class="far fa-comment pl-2 mr-2 text-2xl"
                            ></i>
                            <p>{{ commentCount }}</p>
                        </button>
                        <div v-else class="mt-1 flex">
                            <i
                                @click="showComment = !showComment"
                                class="far fa-comment pl-2 mr-2 text-2xl"
                            ></i>
                            <p>{{ commentCount }}</p>
                        </div>
                        <!-- deleteボタン削除予定 -->
                        <!-- <div
                        v-if="$route.name !== 'drinks'"
                        class="mt-1 flex justify-end"
                    >
                        <button @click="deleteDrink(drink.id)">
                            <i class="far fa-trash text-red-500"></i>
                        </button>
                    </div> -->
                    </div>
                </div>
            </div>

            <!-- Comment -->
            <Transition>
                <div
                    v-if="showComment && $route.name == 'drinkDetails'"
                    class="max-w-lg shadow-md "
                >
                    <ul
                        class="max-w-md text-gray-900  dark:text-white dark:divide-gray-700"
                        v-for="comment in drink.comments"
                    >
                        <li class=" mr-4">
                            <p class="-my-1 mr-4">{{ comment.body }}</p>
                            --------------------------------
                        </li>
                    </ul>
                    <form action="" class="w-full p-4">
                        <div class="mb-2">
                            <label for="comment" class="text-lg text-gray-600"
                                >Add a comment</label
                            >
                            <textarea
                                v-model="data.body"
                                class="w-full h-20 p-2 border rounded focus:outline-none focus:ring-gray-300 focus:ring-1"
                                name="comment"
                                placeholder=""
                                @input="$v.data.body.$touch()"
                            ></textarea>
                            <span
                                v-if="$v.data.body.$error"
                                class="mt-2"
                                :class="{ error: $v.data.body.$error }"
                                >Oops!!!!! 書いてね!</span
                            >
                        </div>
                        <button
                            @click="submitComment"
                            class="px-3 py-2 text-sm text-blue-100 bg-blue-600 rounded"
                        >
                            Comment
                        </button>
                    </form>
                </div>
            </Transition>
        </div>
    </div>
</template>

<script>
import { required } from "vuelidate/lib/validators";
export default {
    props: {
        drink: { Type: Object },
        getDrink: { Type: Function }
        // drinks: { Type: Array }
    },
    data: () => ({
        showComment: false,
        data: {}
    }),
    validations: {
        data: {
            body: {
                required
            }
        }
    },
    computed: {
        image() {
            return this.drink.image
                ? this.drink.image
                : "https://previews.123rf.com/images/arcady31/arcady311303/arcady31130300032/18519959-vector-oops-symbol.jpg";
        },
        commentCount() {
            return this.drink.comments.length;
        },
        hideItemDetails() {
            return (
                this.$route.name == "drinks" ||
                this.$route.name == "drinkRanking" ||
                this.$route.name == "search"
            );
        }
    },
    methods: {
        async deleteDrink(id) {
            if (confirm("Sure?")) {
                await axios
                    .delete(`/api/drinks/${id}`)
                    .then(response => {
                        this.$toast("削除完了!", {
                            position: "top-right",
                            timeout: 2000
                            // transition: "fade"
                        });
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
            }
            // await this.getDrinks()
            this.loading = false;
            this.$router.push("/");
        },
        // async getDrinks() {
        //     await axios
        //         .get("/api/")
        //         .then(response => {
        //             // console.log(response);
        //         })
        //         .catch(function(error) {
        //             console.log(error);
        //         });

        //     this.loading = false;
        // },
        async submitComment(e) {
            this.$v.$touch();
            e.preventDefault();
            if (this.$v.$invalid) {
                console.log("Validation Error");
            } else {
                this.data.drink_id = this.drink.id;
                this.data.user_id = 1;

                await axios
                    .post("/api/comments", this.data)
                    .then(response => {
                        this.$toast("コメントありがとう!", {
                            position: "top-right",
                            timeout: 2000
                            // transition: "fade"
                        });
                        this.loading = false;
                    })
                    .catch(function(error) {
                        console.log(error);
                    });
                this.getDrink();
            }
        },
  
    }
};
</script>
<style>
.v-enter-active,
.v-leave-active {
    transition: opacity 0.5s ease;
}
.v-enter-from,
.v-leave-to {
    opacity: 0;
}
</style>
