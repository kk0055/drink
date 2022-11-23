<template>
<div class="w-full h-auto overflow-scroll block h-screen bg-gradient-to-r from-blue-100 via-purple-100 to-pink-100 p-4 flex items-center justify-center" >
    <div class="bg-white py-6 px-10 sm:max-w-md w-full ">
        <h2 class="sm:text-3xl text-2xl font-semibold text-center text-sky-600  mb-12">
            ログイン 
        </h2>
        <div class="">
            <div>
                 <input type="text" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500"  placeholder="Name "/>
            </div>
             <div>
                 <input type="email" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 my-8"  placeholder="Eamil Adress "/>
            </div>
            <div class="">
                <input type="password" class="focus:outline-none border-b w-full pb-2 border-sky-400 placeholder-gray-500 mb-8"  placeholder="Password " />
            </div>
            <div class="flex justify-center my-6">
                <button class=" rounded-full  p-3 w-full sm:w-56   bg-gradient-to-r from-sky-600  to-teal-300 text-white text-lg font-semibold " >
                    Create Account
                </button>
            </div>
            <div class="flex justify-center ">
                <p class="text-gray-500">Already have an acount? </p>
                 <router-link :to="{name:'register'}" class="text-sky-600 pl-2"> Sign Up</router-link>
            </div>
        </div>
    </div>
</div>  
</template>

<script>
export default {
  
}
</script>