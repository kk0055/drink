<template>
    <div>
        <div>
            <div
                class="search-text flex flex-col w-full items-center  px-6 tracking-wide"
            >
                <div class="text-red-500" role="alert"></div>
            </div>
            <div
                class="carousel relative container mx-auto"
                style="max-width:1600px;"
            >
                <div class="carousel-inner relative overflow-hidden w-full">
                    <!--Slide 1-->
                    <input
                        class="carousel-open"
                        type="radio"
                        id="carousel-1"
                        name="carousel"
                        aria-hidden="true"
                        hidden=""
                        checked="checked"
                    />
                    <div
                        class="carousel-item absolute opacity-0"
                        style="height:50vh;"
                    >
                        <div
                            class="bg block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right"
                            style=""
                        >
                            <div class="container mx-auto">
                                <div
                                    class="flex flex-col w-full items-center  px-6 tracking-wide"
                                >
                                    <p
                                        class="main-title text-black text-2xl my-4"
                                    >
                                        俺の飲んだもの
                                    </p>
                                    <p class="mt-2">
                                        ここには日々俺が飲んだものを書いていくよ。
                                    </p>

                                    <div>
                                        <span class="t">ところで、</span>
                                        <a
                                            class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black mt-3"
                                            href=""
                                            >君は今日何を飲んだ?</a
                                        >
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>

                    <div class="flex flex-col text-center w-full mb-20">
                        <h2
                            class="text-xs text-indigo-500 tracking-widest font-medium title-font mb-1"
                        >
                            <!-- ROOF PARTY POLAROID -->
                        </h2>
                        <h1
                            class="sm:text-3xl text-2xl font-medium title-font mb-4 text-gray-900"
                        >
                            俺の飲んだもの
                        </h1>
                        <p class="lg:w-2/3 mx-auto leading-relaxed text-base">
                            ここには日々俺が飲んだものを書いていくよ。<span
                                class="t"
                                >ところで、</span
                            >
                            君は今日何を飲んだ?
                        </p>
                    </div>
                </div>
            </div>

            <section class="bg-white py-8">
                <div
                    class="container mx-auto flex items-center flex-wrap pt-4 pb-12"
                >
                    <div class="w-full z-30 top-0 px-6 py-1">
                        <div
                            class="w-full container mx-auto flex  items-center justify-end mt-0 px-2 py-3"
                        >
                            <div
                                class="flex items-center "
                                id="store-nav-content"
                            >
                                <!-- <form action="{{ route('item.search') }}"> -->
                                <i class="fas fa-search "> </i>
                                <input
                                    type="text"
                                    name="query"
                                    class=" text-sm rounded-full w-64 px-4  py-1 focus:outline-none border-b focus:shadow-outline "
                                    placeholder=" Search"
                                />
                                <!-- </form> -->
                            </div>
                        </div>
                    </div>

                    <div
                        v-for="drink in drinks"
                        class="w-full md:w-1/3 xl:w-1/4 p-6 flex flex-col  inline-block"
                    >
                        <DrinkItem :drink="drink" />
                    </div>
                </div>

                <!-- <div class="rounded overflow-hidden border ">
                <a href="">  

                <img :src="drink.image" alt="pic"  class="item-image hover:opacity-75 transition ">
                    <div class="pt-3 flex items-center justify-between">
                        <p class="drink-name">{{ drink.name }}</p>
                   
                    </div>
                    <p class="pt-1 text-gray-900 ">
                        <i class="fas fa-star text-yellow-300"></i>
                        {{ drink.score }}</p>
                    <div class="body-box ">
                       <p class="drink-place">買った店：{{ drink.prefecture }}</p>
                        <p class="drink-place">買った店：{{ drink.place }}</p>
                    <p class="mt-2 drink-text">{{ drink.review }}</p>
                    <p class="mt-2 drink-text">{{ drink.map_url }}</p>
                    <p class="mt-2 drink-text">{{ drink.price }}</p>
                    </div>
                    </a>
          </div> -->
                <div class="panel-footer">
                    <!-- <favorite-btn
                        :drink={{ $drink->id }}
                        :favorited={{ $drink->favorited() ? 'true' : 'false' }}
                    ></favorite-btn> -->
                </div>

                <!--    
            {{ $drinks->links() }} -->
            </section>
        </div>
        <section class="bg-white py-8">
            <div class="container py-8 px-6 mx-auto">
                <a
                    class="tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl mb-8"
                    href="#"
                >
                </a>
                <p class="mb-8 footer-tesxt">
                    世の中には飲んだことのない飲み物が無数にある。<br />
                    何が美味しいかなんて飲んでみないとわからない。 <br />
                    不味いかもしれない。苦いかもしれない。甘すぎるかもしれない。<br />
                    それでもたまには美味しいものに出会えるよ。たぶん。
                </p>
            </div>
        </section>

        <footer class="container mx-auto bg-white py-8  border-gray-400">
            <div class="container flex px-3 py-8 ">
                <div class="w-full mx-auto flex flex-wrap">
                    <div class="flex w-full lg:w-1/2 "></div>
                    <div
                        class="flex w-full lg:w-1/2 lg:justify-end lg:text-right"
                    ></div>
                </div>
            </div>
        </footer>
    </div>
</template>

<script>
import DrinkItem from "../../components/DrinkItem";
export default {
    components: {
        DrinkItem
    },
    props: {
        drinks: Array
    }
};
</script>
