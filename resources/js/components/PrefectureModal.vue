<template>
    <Modal
        :data="data"
        :itemlists="prefectures"
        @cancel="cancel"
        @accepted="selectPrefecture"
    />
</template>

<script>
import Modal from "./Modal.vue";
export default {
    data: () => ({
        showModal: false,
        data: {},
    }),
    components: {
        Modal
    },
    props: {
        prefectures: Array
    },
    created() {},
    computed: {
    },
    methods: {
        cancel() {
            this.$emit("closeModal");
        },
        selectPrefecture(value) {
            const name = this.prefectures.filter(o => value.includes(o.id)).map(o => o.name)
            this.$router.push({
                name: "search",
                query: { prefectures: name}
            });
        }
    }
};
</script>
