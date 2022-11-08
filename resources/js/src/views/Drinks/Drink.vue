<template>
    <div>
        <DrinkItem :drink="drink" />
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
