<template>
    <div>
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
        <div
            v-else
            class="w-full h-auto overflow-scroll block h-screen bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-4 flex items-center justify-center"
        >
            <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
                <DrinkItem :drink="drink" :drinks="drinks" :getDrink="getDrink"/>
            </div>
        </div>
    </div>
</template>

<script>
import DrinkItem from "../../../components/DrinkItem";
export default {
    components: {
        DrinkItem
    },
    props: {
        drinks:Array
    },
    data: () => ({
        drink: [],
        loading: true
    }),
    async created() {
        await Promise.all([this.getDrink()]);
    },
    computed: {
        id() {
            return Number(this.$route.params.drinkId);
        }
    },
    methods: {
        async getDrink() {
            this.loading = true;
            await axios
                .get(`/api/drinks/${this.id}`, {
                    params: {
                    with:'comments,tags'
                    }
                })
                .then(response => {
                    this.drink = response.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
            this.loading = false;
        }
    }
};
</script>
