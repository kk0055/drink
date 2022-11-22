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
                <h3 class="drink-name text-rose-500">{{ drink.name }}</h3>
                <i class="fas fa-star text-yellow-300"></i>
                {{ drink.score }}
                <favorite-btn
                    :drink="drink.id"
                    :favorited="drink.favorited ? 'true' : 'false'"
                    class="pl-2"
                ></favorite-btn>
                <i class="far fa-comment pl-2"></i>
            </div>

            <div class="pt-1">
                <div class="mb-2 text-sm">
                    <p class="drink-place">
                        <i class="fas fa-tenge mr-2 text-blue-700"></i
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
        </div>
    </div>
</template>

<script>
export default {
    props: {
        drink: { Type: Object }
    },
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
                        this.drinks = response.data;
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
            this.loading = false;
            this.getDrinks()
            this.$router.push("/");
        },
        async getDrinks() {
            await axios
                .get("/api/")
                .then(response => {
                    this.drinks = response.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    }
};
</script>
