<template>
  <div>
    <HeaderComponent></HeaderComponent>
    <router-view :drinks="drinks"></router-view>
  </div>
</template>

<script>
import HeaderComponent from "../components/Header";
export default {
  name: "app",
  components: {
    HeaderComponent,
  },
  data: () => ({
    drinks: [],
  }),
  async created() {
    await Promise.all([this.getData()]);
  },
  methods: {
    async getData() {
      await axios
        .get("/api/")
        .then((response) => {
          this.drinks = response.data;
        })
        .catch(function (error) {
          console.log(error);
        });
    },
  },
};
</script>
<style>
a {
  color: grey;
}
</style>