<template>
    <nav class="bg-gray-800">
        <div class="mx-auto max-w-7xl px-2 sm:px-6 lg:px-8">
            <div class="relative flex h-16 items-center justify-between">
                <div
                    class="absolute inset-y-0 left-0 flex items-center sm:hidden"
                >
                    <!-- Mobile menu button-->
                    <button
                        type="button"
                        @click="openNav = !openNav"
                        class="inline-flex items-center justify-center rounded-md p-2 text-gray-400 hover:bg-gray-700 hover:text-white focus:outline-none focus:ring-2 focus:ring-inset focus:ring-white"
                        aria-controls="mobile-menu"
                        aria-expanded="false"
                    >
                        <span class="sr-only">Open main menu</span>
                        <!-- バーガーメニュー -->
                        <svg
                            class="block h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M3.75 6.75h16.5M3.75 12h16.5m-16.5 5.25h16.5"
                            />
                        </svg>
                        <!-- hidden バーガーメニュー -->
                        <svg
                            class="hidden h-6 w-6"
                            xmlns="http://www.w3.org/2000/svg"
                            fill="none"
                            viewBox="0 0 24 24"
                            stroke-width="1.5"
                            stroke="currentColor"
                            aria-hidden="true"
                        >
                            <path
                                stroke-linecap="round"
                                stroke-linejoin="round"
                                d="M6 18L18 6M6 6l12 12"
                            />
                        </svg>
                    </button>
                </div>
                <div
                    class="flex flex-1 items-center justify-center sm:items-stretch sm:justify-start"
                >
                    <div class="flex flex-shrink-0 items-center">
                        <router-link
                            class="flex items-center tracking-wide text-gray-800 text-xl"
                            :to="{ name: 'drinks' }"
                        >
                            <img
                                class="block h-8 w-auto lg:hidden rounded-full"
                                src="/images/logo.png"
                                alt="俺の飲んだもの"
                            />
                        </router-link>
                        <router-link
                            class="flex items-center tracking-wide text-gray-800 text-xl"
                            :to="{ name: 'drinks' }"
                        >
                            <img
                                class="hidden h-8 w-auto lg:block rounded-full"
                                src="/images/logo.png"
                                alt="俺の飲んだもの"
                            />
                        </router-link>
                    </div>
                    <div class="hidden sm:ml-6 sm:block">
                        <div class="flex space-x-4">
                            <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                            <router-link
                                class="bg-gray-900 text-white px-3 py-2 rounded-md text-sm font-medium"
                                aria-current="page"
                                to="/drink"
                            >
                                何か飲んだから書く?</router-link
                            >

                            <!-- <router-link to="/login" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">ログイン</router-link>

         <router-link to="#" class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium">俺のお気に入り</router-link> -->

                            <router-link
                                :to="{ name: 'drinkRanking' }"
                                class="text-gray-300 hover:bg-gray-700 hover:text-white px-3 py-2 rounded-md text-sm font-medium"
                                ><i
                                    class="fas fa-crown text-yellow-500 mr-1"
                                ></i
                                >ランキング</router-link
                            >
                        </div>
                    </div>
                </div>
                <div
                    class="absolute inset-y-0 right-0 flex items-center pr-2 sm:static sm:inset-auto sm:ml-6 sm:pr-0"
                >
                    <!-- Search -->
                    <!-- <div class="w-full z-30 top-0 px-6 py-1">
            <div
                class="w-full container mx-auto flex  items-center justify-end mt-0 px-2 py-3"
            >
                <div
                    class="flex items-center relative mb-6"
                    id="store-nav-content"
                >
                    <div
                        class="absolute inset-y-0 left-0 flex items-center pl-3 pr-10 pointer-events-none"
                    >
                        <i class="fas fa-search "> </i>
                    </div>
                    <input
                        type="text"
                        name="query"
                        class="block  text-sm rounded-full w-64 p-4 pl-2 py-1 focus:outline-none border border-gray-300 border-b focus:shadow-outline "
                        placeholder="  Search"
                    />
               
                </div>
            </div>
        </div> -->
                    <!-- notifications -->
                    <!-- <button type="button" class="rounded-full bg-gray-800 p-1 text-gray-400 hover:text-white focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800">
          <span class="sr-only">View notifications</span>
          <svg class="h-6 w-6" xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
            <path stroke-linecap="round" stroke-linejoin="round" d="M14.857 17.082a23.848 23.848 0 005.454-1.31A8.967 8.967 0 0118 9.75v-.7V9A6 6 0 006 9v.75a8.967 8.967 0 01-2.312 6.022c1.733.64 3.56 1.085 5.455 1.31m5.714 0a24.255 24.255 0 01-5.714 0m5.714 0a3 3 0 11-5.714 0" />
          </svg>
        </button> -->

                    <!-- Profile dropdown -->
                    <div class="relative ml-3">
                        <div>
                            <div
                                class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800"
                                id="user-menu-button"
                                aria-expanded="false"
                                aria-haspopup="true"
                                @click="showProf = !showProf"
                            >
                                <span class="sr-only">Open user menu</span>
                                <router-link to="/drink">
                                <i class="fas fa-plus h-8 w-8 fa-2x text-white"></i>
                                    <!-- <img
                                        class="h-8 w-8 rounded-full"
                                        src="/images/girl.png"
                                        alt=""
                                    /> -->
                                </router-link>
                            </div>
                        </div>
                        <!-- <div>
            <button type="button" class="flex rounded-full bg-gray-800 text-sm focus:outline-none focus:ring-2 focus:ring-white focus:ring-offset-2 focus:ring-offset-gray-800" id="user-menu-button" aria-expanded="false" aria-haspopup="true" @click="showProf = !showProf">
              <span class="sr-only">Open user menu</span>
              <img class="h-8 w-8 rounded-full" src="/images/girl.png" alt="">
            </button>
          </div> -->

                        <!--
            Dropdown menu, show/hide based on menu state.

            Entering: "transition ease-out duration-100"
              From: "transform opacity-0 scale-95"
              To: "transform opacity-100 scale-100"
            Leaving: "transition ease-in duration-75"
              From: "transform opacity-100 scale-100"
              To: "transform opacity-0 scale-95"
          -->
                        <!-- <div v-if="showProf" class="absolute right-0 z-10 mt-2 w-48 origin-top-right rounded-md bg-white py-1 shadow-lg ring-1 ring-black ring-opacity-5 focus:outline-none" role="menu" aria-orientation="vertical" aria-labelledby="user-menu-button" tabindex="-1">
            Active: "bg-gray-100", Not Active: ""
            <a to="#"  href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-0">Your Profile</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-1">Settings</a>
            <a href="#" class="block px-4 py-2 text-sm text-gray-700" role="menuitem" tabindex="-1" id="user-menu-item-2">Sign out</a>
          </div> -->
                    </div>
                </div>
            </div>
        </div>

        <!-- Mobile menu, show/hide based on menu state. -->
        <div class="sm:hidden" id="mobile-menu" v-if="openNav">
            <div class="space-y-1 px-2 pt-2 pb-3">
                <!-- Current: "bg-gray-900 text-white", Default: "text-gray-300 hover:bg-gray-700 hover:text-white" -->
                <router-link
                    to="/drink"
                    class="bg-gray-900 text-white block px-3 py-2 rounded-md text-base font-medium"
                    aria-current="page"
                    >何か飲んだから書く</router-link
                >

                <!-- <router-link to="/login"  class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">ログイン</router-link>

      <router-link to="#"  class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium">俺のお気に入り</router-link> -->

                <router-link
                    :to="{ name: 'drinkRanking' }"
                    class="text-gray-300 hover:bg-gray-700 hover:text-white block px-3 py-2 rounded-md text-base font-medium"
                    ><i class="fas fa-crown text-yellow-500 mr-1"></i
                    >ランキング</router-link
                >
            </div>
        </div>
    </nav>
</template>

<script>
export default {
    data() {
        return {
            showProf: false,
            openNav: false
        };
    }
};
</script>
