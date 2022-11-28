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
          <h2 class="block text-2xl font-bold text-gray-800 dark:text-white mt-3">どこにする？</h2>
       
        </div>
                    <!--body-->

                    <div class="relative p-3 flex-auto">
                        <div class="mt-1">
                            <select
                                v-model="data.prefecture"
                                id="prefectures"
                                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-1 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                            >
                                <option
                                    v-for="prefecture in prefectures"
                                    :value="prefecture.name"
                                    >{{ prefecture.name }}</option
                                >
                            </select>
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
        data: {}
    }),
    components: {},
    props: {
        prefectures: Array
    },
    created() {},
    computed: {},
    methods: {
        cancel() {
            this.$emit("execute-method", false);
        },
        selectPrefecture() {
            this.$emit("execute-method", this.data.prefecture);
        }
    }
};
</script>
