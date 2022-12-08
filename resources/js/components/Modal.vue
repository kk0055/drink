<template>
    <div class="">
        <div
            class="overflow-x-hidden overflow-y-auto fixed inset-0 z-50 outline-none focus:outline-none justify-center items-center  flex"
        >
            <div class="relative w-auto my-6 mx-auto max-w-3xl ">
                <!--content-->
                <div
                    class="border-0 rounded-lg shadow-lg relative flex flex-col w-full bg-white outline-none focus:outline-none p-3"
                >
                    <!--header-->
                    <div class="text-center">
                        <h2
                            class="block text-2xl font-bold text-gray-800 dark:text-white mt-3"
                        >
                            どれにする？
                        </h2>
                    </div>
                    <!--body-->

                    <div class=" flex flex-wrap ">
                        <div class="flex flex-row mr-1" v-for="item in itemlists">
                            <input
                                type="checkbox"
                                v-model="selectedItems"
                                :value="item.id"
                                :id="item.id"
                            />
                            <label
                                :for="item.id"
                                class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900 my-1"
                            >
                                #{{ item.name }}
                            </label>
                            <!-- <div
                                class="bg-green-100 text-green-800 text-xs font-semibold mr-2 px-2.5 py-0.5 rounded dark:bg-green-200 dark:text-green-900 my-1"
                            >
                                #{{ tag.name }}
                            </div> -->
                        </div>
                    </div>
                    <!--footer-->
                    <div
                        class="flex items-center justify-end p-6 border-t border-solid border-slate-200 rounded-b"
                    >
                        <button
                            class="text-red-500 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button"
                            @click="$emit('cancel')"
                        >
                            Close
                        </button>
                        <button
                            class="text-red-500 bg-transparent border border-solid border-red-500 hover:bg-red-500 hover:text-white active:bg-red-600 font-bold uppercase text-sm px-6 py-3 rounded outline-none focus:outline-none mr-1 mb-1 ease-linear transition-all duration-150"
                            type="button"
                            @click="$emit('accepted' ,selectedItems)"
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
      selectedItems:[]
    }),
    components: {},
    props: {
       data: { Type: Array },
       itemlists: { Type: Array },
    },
    created() {
    },
    computed: {},
    methods: {
        cancel() {
            this.$emit("closeModal");
        },
    }
};
</script>
