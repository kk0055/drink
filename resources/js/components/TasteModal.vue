<template>
    <div>
        <div
            class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center flex"
        >
            <div class="relative w-auto my-6 mx-auto max-w-3xl">
                <!--content-->
                <div
                    class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none"
                >
                    <!--header-->
                <div class="text-center">
          <h2 class="block text-2xl font-bold text-gray-800 dark:text-white mt-3">どれにする？</h2>
       
        </div>
                    <!--body-->

             <div class=" flex flex-wrap ">
                        <div class="flex flex-row mr-1" v-for="tag in tags">
                            <input
                                type="checkbox"
                                v-model="selectedTags"
                                :value="tag.id"
                            />
                            <div
                                class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900 my-1 "
                            >
                                #{{ tag.name }}
                            </div>
                        </div>
                    </div>
                    <!--footer-->
                    <div
                        class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b"
                    >
                        <button
                            class="text-red-500 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button"
                            @click="cancel()"
                        >
                            Close
                        </button>
                        <button
                            class="text-red-500 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button"
                            @click="selectPrefecture()"
                        >
                          Okay<i class="far fa-thumbs-up"></i>
                        </button>
                    </div>
                </div>
            </div>
        </div>
        <div class="opacity-25 fixed inset-0 z-40 bg-black"></div>
    </div>
</template>

<script>
export default {
    data: () => ({
        showModal: false,
        data: {},
        tags: [],
        selectedTags:[],
    }),
    components: {},
    props: {
        prefectures: Array
    },
    created() {
      this.getTags()
    },
    computed: {},
    methods: {
        cancel() {
            this.$emit("execute-method", false);
        },
        selectPrefecture() {
            if(this.data.prefecture == '全部') {
                this.data.prefecture = ''
            }
            this.$emit("execute-method", JSON.stringify(this.selectedTags));
        },
            async getTags() {
            await axios
                .get("/api/tags")
                .then(res => {
                    // console.log(res);
                    this.tags = res.data;
                })
                .catch(function(error) {
                    console.log(error);
                });
        }
    }
};
</script>
