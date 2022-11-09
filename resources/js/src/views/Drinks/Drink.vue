<template>
    <div class="w-full h-auto overflow-scroll block h-screen bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-4 flex items-center justify-center" >
        <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
        <DrinkItem :drink="drink" />
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
        drinkId: { Type: Number }
    },
    data: () => ({
        drink: []
    }),
    async created() {
        await Promise.all([this.getData()]);
    },
    computed: {
        id() {
            return Number(this.$route.params.drinkId);
        }
    },
    methods: {
        async getData() {
            await axios
                .get(`/api/drinks/${this.id}`)
                .then(response => {
                    this.drink = response.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    }
};
</script>
