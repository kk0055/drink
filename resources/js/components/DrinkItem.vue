<template>
    <div
        class="pt-3 px-1 rounded overflow-hidden border w-full bg-white mx-3 md:mx-0 lg:mx-0"
    >
        <img
            v-if="$route.name == 'drinks'"
            class="h-48 md:h-36 w-full object-cover object-center"
            width="300px"
            height="350px"
            :src="image"
        />
        <!-- <img class="w-full bg-cover p-3" width="300px" height="350px" v-if="$route.name == 'drinks'"  :src="drink.image"> -->
        <img
            v-else
            class="p-3  w-full object-center"
            width="200px"
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
                    <p class="mt-2 drink-text " v-if="$route.name == 'drinks'">
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
                    <p class="mt-2 drink-text">
                        <i class="fas fa-yen-sign mr-2"></i>{{ drink.price }} 円
                    </p>
                    <p class="mt-1 drink-text" v-if="$route.name == 'drinks'">
                        {{ drink.review }}
                    </p>
                    <p class="mt-1" v-else>{{ drink.review }}</p>

                    <div
                        v-if="$route.name == 'drinks'"
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
                    <span class="mt-1 flex justify-start ">
                        <i
                            @click="showComment = !showComment"
                            class="far fa-comment pl-2 mr-2 text-2xl"
                        ></i>
                        <p>{{ drink.comments.length }}</p>
                    </span>
                    <!-- deleteボタン削除予定 -->
                    <div
                        v-if="$route.name !== 'drinks'"
                        class="mt-1 flex justify-end"
                    >
                        <button @click="deleteDrink(drink.id)">
                            <i class="far fa-trash text-red-500"></i>
                        </button>
                    </div>
                </div>
            </div>
            <!-- Comment -->
            <div
                v-if="showComment && $route.name != 'drinks'"
                class="max-w-lg shadow-md"
            >
                <div>
                    <ul
                        class="divide-solid max-w-md text-gray-900 divide-y divide-green-500 dark:text-white dark:divide-gray-700"
                        v-for="comment in drink.comments"
                    >
                        <li>
                            <p>{{ comment.body }}</p>
                        </li>
                    </ul>
                </div>
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
                        ></textarea>
                    </div>
                    <button
                        @click="submitComment"
                        class="px-3 py-2 text-sm text-blue-100 bg-blue-600 rounded"
                    >
                        Comment
                    </button>
                </form>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    props: {
        drink: { Type: Object }
        // drinks: { Type: Array }
    },
    data: () => ({
        showComment: false,
        data: {}
    }),
    computed: {
        image() {
            return this.drink.image
                ? this.drink.image
                : "https://previews.123rf.com/images/arcady31/arcady311303/arcady31130300032/18519959-vector-oops-symbol.jpg";
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
        async getDrinks() {
            await axios
                .get("/api/")
                .then(response => {
                    // console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });

            this.loading = false;
        },
        async submitComment() {
            this.data.drink_id = this.drink.id
            this.data.user_id = 1
            await axios
                .post("/api/comments",this.data)
                .then(response => {
                    // console.log(response);
                })
                .catch(function(error) {
                    console.log(error);
                });

            this.loading = false;
        }
    }
};
</script>
