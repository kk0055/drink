<template>
    <div
        class="pt-3 px-1 rounded overflow-hidden border w-full bg-white mx-3 md:mx-0 lg:mx-0"
    >
        <img
            class="lg:h-48 md:h-36 w-full object-cover object-center"
            width="300px"
            height="350px"
            v-if="$route.name == 'drinks'"
            :src="drink.image"
        />
        <!-- <img class="w-full bg-cover p-3" width="300px" height="350px" v-if="$route.name == 'drinks'"  :src="drink.image"> -->
        <img class="p-3" v-else width="200px" :src="drink.image" />
        <div class="px-3 pb-2">
            <div class="pt-2">
                <h2 class="drink-name text-rose-500">{{ drink.name }}</h2>
                <i class="fas fa-star text-yellow-300"></i>
                {{ drink.score }}
                <favorite-btn
                    :drink="drink.id"
                    :favorited="drink.favorited ? 'true' : 'false'"
                    class="pl-2"
                ></favorite-btn>
            </div>

            <div class="pt-1">
                <div class="mb-2 text-sm">
                    <p class="drink-place "><i class="fas fa-tenge mr-2 text-blue-700"></i>{{ drink.prefecture }}</p>
                    <p class="drink-place">
                        <i class="fas fa-map-marker-alt mr-2"></i>
                        {{ drink.place }}
                    </p>
                    <p class="mt-2 drink-text">
                        <i class="far fa-globe mr-2"></i>{{ drink.map_url }}
                    </p>
                    <p class="mt-2 drink-text"><i class="fas fa-yen-sign mr-2"></i>{{ drink.price }}円</p>
                    <p class="mt-1 drink-text">{{ drink.review }}</p>

                    <div v-if="$route.name == 'drinks'">
                        <router-link
                            :to="{
                                name: 'drinkDetails',
                                params: { drinkId: drink.id }
                            }"
                            >詳細
                        </router-link>
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
    }
};
</script>
