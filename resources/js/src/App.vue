<template>
    <!-- <div
        v-if="loading"
        class="flex justify-center items-center"
        style="height: 90vh"
    >
        <div
            class="spinner-border animate-spin inline-block w-8 h-8 border-4 rounded-full text-blue-400"
            role="status"
        ></div>
    </div> -->
    <div class="bg-white" >
        <HeaderComponent></HeaderComponent>
        <router-view :drinks="drinks" ></router-view>
    </div>
</template>

<script>
import HeaderComponent from "../components/Header";
export default {
    name: "app",
    components: {
        HeaderComponent
    },
    data: () => ({
        drinks: [],
        loading: true,
        user:{}
    }),
    async created() {
        // await Promise.all([this.getUser()]);
    },
    methods: {
        // async getData() {
        //     await axios
        //         .get("/api/")
        //         .then(response => {
        //             this.drinks = response.data;
        //         })
        //         .catch(function(error) {
        //             console.log(error);
        //         });
            
        //     this.loading = false;
        // }
              async getUser() {
            await axios
                .get("/api/user")
                .then(response => {
                    this.user = response.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
            
            this.loading = false;
        }
    }
};
</script>
<style>
a {
    color: grey;
}
h1 {
    font-family: "Stick", sans-serif;
}
h2 {
    font-family: "Stick", sans-serif;
}
p {
    font-family: "Bitter", sans-serif;
}
.error {
    color: #dd0f3b;
}
</style>
