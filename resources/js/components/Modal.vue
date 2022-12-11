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

                    <div class=" flex flex-wrap" >
                        <div
                            class="flex flex-row mr-1"
                            v-for="item in itemlists"
                        >
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
                            @click="$emit('cancel')"
                            class="relative z-30 inline-flex items-center justify-center w-auto px-4 py-2 overflow-hidden font-bold text-gray-500 transition-all duration-500 border border-gray-200 rounded-md cursor-pointer group ease bg-gradient-to-b from-white to-gray-50 hover:from-gray-50 hover:to-white active:to-white"
                        >
                            <span
                                class="w-full h-0.5 absolute bottom-0 group-active:bg-transparent left-0 bg-gray-100"
                            ></span>
                            <span
                                class="h-full w-0.5 absolute bottom-0 group-active:bg-transparent right-0 bg-gray-100"
                            ></span>
                            Close
                        </button>
                        <button
                            @click="$emit('accepted', selectedItems)"
                            class="ml-2 inline-flex items-center justify-center px-4 py-2 text-base font-medium text-center text-indigo-100 border border-indigo-500 rounded-lg shadow-sm cursor-pointer hover:text-white bg-gradient-to-br from-purple-500 via-indigo-500 to-indigo-500"
                        >
                            <span class="relative"
                                >Okay<i class="ml-1 far fa-thumbs-up"></i
                            ></span>
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
        selectedItems: []
    }),
    components: {},
    props: {
        data: { Type: Array },
        itemlists: { Type: Array }
    },
    created() {},
    computed: {},
    methods: {
        cancel() {
            this.$emit("closeModal");
        }
    }
};
</script>
