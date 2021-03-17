<template>
    <span>
        <a href="#" v-if="isFavorited" @click.prevent="unFavorite(drink)">
           <i class="far fa-heart"></i>
        </a>
        <a href="#" v-else @click.prevent="favorite(drink)">
            <i  class="far fa-heart"></i>
        </a>
    </span>
</template>

<script>
    export default {
        props: ['drink', 'favorited'],

        data: function() {
            return {
                isFavorited: '',
            }
        },

        mounted() {
            this.isFavorited = this.isFavorite ? true : false;
        },

        computed: {
            isFavorite() {
                return this.favorited;
            },
        },

        methods: {
            favorite(drink) {
                axios.post('/favorite/'+drink)
                    .then(response => this.isFavorited = true)
                    .catch(response => console.log(response.data));
            },

            unFavorite(drink) {
                axios.post('/unfavorite/'+drink)
                    .then(response => this.isFavorited = false)
                    .catch(response => console.log(response.data));
            }
        }
    }
</script>