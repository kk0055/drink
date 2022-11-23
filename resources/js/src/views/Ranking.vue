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
    <div v-else>
        <div>
            <div>
    
                <section class="bg-white py-4">
                    <div
                        class="container mx-auto flex items-center flex-wrap pt-1 pb-12 "
                    >
                        <div
                            v-for="drink in drinks"
                            class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col  inline-block sm:-m-4 -mx-4 md:mx-0"
                        >
                            <DrinkItem :drink="drink" :drinks="drinks" />
                        </div>
                    </div>
                    <!-- <favorite-btn
                        :drink={{ $drink->id }}
                        :favorited={{ $drink->favorited() ? 'true' : 'false' }}
                    ></favorite-btn> -->
                </section>
            </div>
            <Footer />
        </div>
    </div>
  </div>
</template>

<script>
import DrinkItem from "../../components/DrinkItem";
import Footer from "../../components/Footer";
export default {
    components: {
        DrinkItem,
        Footer
    },
    props: {
        // drinks: Array
    },
    data: () => ({
        drinks: [],
        loading: true
    }),
    async created() {
        await Promise.all([this.getDrinks()]);
    },
    methods: {
        async getDrinks() {
            await axios
                .get("/api/drinks", {
                    params: {
                        with: "comments",
                        ranking:'true'
                    }
                })
                .then(response => {
                    this.drinks = response.data;
                })
                .catch(function(error) {
                    console.log(error);
                });

            this.loading = false;
        }
    }
};
</script>
