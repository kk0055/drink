<template>
    <span>
        <a href="#" v-if="isFavorited" @click.prevent="unFavorite(drink)">
          <i class="fas fa-heart"></i>
        </a>
        <a href="#" v-else @click.prevent="favorite(drink)">
            <i  class="far fa-heart"></i>
            <p>{{ count }}</p>
        </a>
      
    </span>
</template>

<script>
    export default {
        props: ['drink', 'favorited'],

        data: function() {
            return {
                isFavorited: '',
                count : ''
            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
            this.countfavorites();
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
        },

        methods: {
            favorite(drink) {
                axios.post('/favorite/'+ drink)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(drink) {
                axios.post('/unfavorite/'+drink.id)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data));

            },     
            countfavorites(drink) {
                axios.get('/count/' + drink)
                .then(res => {
                    this.count = res.data;
                    console.log(this.count)
                }).catch(function(error){
                    console.log(error);
                });
            },
       
        }
    }
</script>