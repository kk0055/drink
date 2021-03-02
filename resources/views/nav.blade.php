  
    <nav id="header" class="w-full z-30 top-0 py-1">
     
      <div class="w-full container mx-auto flex flex-wrap items-center justify-between mt-0 px-6 py-3">
      
          <label for="menu-toggle" class="cursor-pointer md:hidden block">
              <svg class="fill-current text-gray-900" xmlns="http://www.w3.org/2000/svg" width="20" height="20" viewBox="0 0 20 20">
                  <title>何飲んだ？</title>
                  <path d="M0 3h20v2H0V3zm0 6h20v2H0V9zm0 6h20v2H0v-2z"></path>
              </svg>
             
          </label>
          <input class="hidden" type="checkbox" id="menu-toggle" />
          
          <div class="hidden md:flex md:items-center md:w-auto w-full order-3 md:order-1" id="menu">
            
          
              <nav class="nav">
                  <ul class="md:flex items-center justify-between text-base text-gray-700 pt-4 md:pt-0">
                    @guest
               
                      <li><a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('login') }}">ログイン</a></li>
                      <li><a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('register') }}">登録</a></li>
                    @endguest

                  
                    @auth
                    <li>
                    <a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('logout') }}"
                    onclick="event.preventDefault();
                                  document.getElementById('logout-form').submit();">
                     ログアウト
                 </a></li>
                 
                 <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                    @csrf
                </form>
                 @endauth
               
                    
           
                  

                    <li>
                        <a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('drinks.ranking') }}">ランキング</a> 
                    </li>

                    <li><a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="{{ route('drinks.create') }}">何か飲んだから書く?</a></li>
                    <li><a class="inline-block no-underline hover:text-black hover:underline py-2 px-4" href="https://www.amazon.co.jp/b/ref=s9_acss_bw_ln_Grocery_1_20s_w?ie=UTF8&node=71442051&pf_rd_m=A3P5ROKL5A1OLE&pf_rd_s=merchandised-search-leftnav&pf_rd_r=5AHSHQJPB75AZ04J7H7M&pf_rd_t=101&pf_rd_p=8e6be6b0-ad1d-4854-be00-ceab93a3847b&pf_rd_i=57239051" target="_blank">注文する?(Amazon)</a></li>
                  </ul>    
              </nav>
         
            
          </div>
                 <div class="order-1 md:order-2 ">
              <a class="flex items-center tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl " href="{{ route('drinks.index') }}">
                  <i class="fas fa-wine-bottle"></i>
              </a>
         
          </div>
    
       
      </div>
  </nav>