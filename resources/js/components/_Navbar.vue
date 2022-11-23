<template>
<div id="header" class="w-full z-30 top-0 py-1">
  <div
    class="
      w-full
      container
      flex flex-wrap
      items-center
      justify-between
      mx-auto
      mt-0
      px-2
  
    "
  >
    <label for="menu-toggle" class="cursor-pointer md:hidden block">
      <svg
        class="fill-current text-gray-900"
        xmlns="http://www.w3.org/2000/svg"
        width="20"
        height="20"
        viewBox="0 0 20 20"
      >
        <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
      </svg>
    </label>
    <input class="hidden" type="checkbox" id="menu-toggle" />

    <div
      class="
        hidden
        md:flex md:items-center md:w-auto
        w-full
        order-3
        md:order-1
      "
      id="menu"
    >
      <nav class="nav">
        <ul
          class="
            md:flex
            items-center
            justify-between
            text-base text-gray-700
            pt-1
            md:pt-0
          "
        >
          <!-- <li>
            <router-link
              class="
                inline-block
                no-underline
                hover:text-black hover:underline
                py-2
                px-4
              "
              :to="{name:'login'}"
              >ログイン</router-link
            >
          </li> -->
          <li>
            <router-link
              class="
                inline-block
                no-underline
                hover:text-black hover:underline
                py-2
                px-4
              "
              :to="{name:'register'}"
              >登録
              </router-link
            >
          </li>

          <!-- <li>
            <a
              class="
                inline-block
                no-underline
                hover:text-black hover:underline
                py-2
                px-4
              "
              href=""
              onclick="event.preventDefault();
                                document.getElementById('logout-form').submit();"
            >
              ログアウト
            </a>
          </li> -->

          <li>
            <a
              class="
                inline-block
                no-underline
                hover:text-black hover:underline
                py-2
                px-4
              "
              href=""
              >俺のお気に入り</a
            >
          </li>

          <li>
            <a
              class="
                inline-block
                no-underline
                hover:text-black hover:underline
                py-2
                px-4
              "
              href=""
              >ランキング</a
            >
          </li>

          <li>
            <router-link
              class="
                inline-block
                no-underline
                hover:text-black hover:underline
                py-2
                px-4
              "
              to="/drink"
              >何か飲んだから書く?</router-link
            >
          </li>
          <li>
            <a
              class="
                inline-block
                no-underline
                hover:text-black hover:underline
                py-2
                px-4
              "
              href="https://www.amazon.co.jp/b/ref=s9_acss_bw_ln_Grocery_1_20s_w?ie=UTF8&node=71442051&pf_rd_m=A3P5ROKL5A1OLE&pf_rd_s=merchandised-search-leftnav&pf_rd_r=5AHSHQJPB75AZ04J7H7M&pf_rd_t=101&pf_rd_p=8e6be6b0-ad1d-4854-be00-ceab93a3847b&pf_rd_i=57239051"
              target="_blank"
              >注文する?(Amazon)</a
            >
          </li>
        </ul>
      </nav>
    </div>
    <div class="order-1 md:order-2">
      <router-link
        class="
          flex
          items-center
          tracking-wide
          no-underline
          hover:no-underline
          font-bold
          text-gray-800 text-xl
        "
        :to="{name:'drinks'}"
      >
        <i class="fas fa-wine-bottle"></i>
      </router-link>
    </div>
  </div>
</div>
</template>

<script>
export default {};
</script>