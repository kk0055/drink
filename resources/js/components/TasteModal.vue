<template>
    <Modal
        :data="data"
        :itemlists="tags"
        @cancel="cancel"
        @accepted="selectTaste"
    />
</template>

<script>
import Modal from "./Modal.vue";
export default {
    data: () => ({
        showModal: false,
        data: {},
        tags: [],
    }),
    components: {
        Modal
    },
    props: {},
    created() {
        this.getTags();
    },
    computed: {},
    methods: {
        cancel() {
            this.$emit("closeModal");
        },
        selectTaste(value) {
            this.$router.push({
                name: "Search",
                query: { tags: JSON.stringify(value) }
            });
        },
        async getTags() {
            await axios
                .get("/api/tags")
                .then(res => {
                    this.tags = res.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    }
};
</script>
