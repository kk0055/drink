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
                <h2 class="drink-name">{{ drink.name }}</h2>
                <i class="fas fa-star text-yellow-300"></i>
                {{ drink.score }}
            </div>
            <div class="pt-1">
                <div class="mb-2 text-sm">
                    <p class="drink-place">買った県：{{ drink.prefecture }}</p>
                    <p class="drink-place">買った場所：{{ drink.place }}</p>
                    <p class="mt-1 drink-text">{{ drink.review }}</p>
                    <p class="mt-2 drink-text">{{ drink.map_url }}</p>
                    <p class="mt-2 drink-text">値段：{{ drink.price }}円</p>
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
