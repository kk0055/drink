<template>
<div>
  <HeaderComponent></HeaderComponent>
  <router-view></router-view>
</div>
</template>

<script>
import HeaderComponent from '../components/Header'
export default {
   name:'app',
    components: {
    HeaderComponent,
  },
    data: () => ({
    data:{},

  }),
    async created() {
    await Promise.all([this.getData()])
  },
    methods: {

    async getData() {
        await axios.get("/api/")
      .then((response) => {
       this.data = response.data
      })
      .catch(function (error) {
        console.log(error);
      });
    },
  },
}
</script>