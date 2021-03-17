@extends('layouts.default')
@section('contents')

@include('nav')   

<div class="search-text flex flex-col w-full items-center  px-6 tracking-wide">
    @if (Session::has('info'))
    <div class="text-red-500" role="alert">
        {{ Session::get('info') }}
    </div>
@endif
   
    </div>
    <div  class="carousel relative container mx-auto" style="max-width:1600px;">
        <div class="carousel-inner relative overflow-hidden w-full">
            <!--Slide 1-->
            <input class="carousel-open" type="radio" id="carousel-1" name="carousel" aria-hidden="true" hidden="" checked="checked">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div class="bg block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="">

                    <div class="container mx-auto">
                        <div class="flex flex-col w-full items-center  px-6 tracking-wide">
                            <p class="main-title text-black text-2xl my-4">俺の飲んだもの</p>
                            <p class="mt-2">ここには日々俺が飲んだものを書いていくよ。</p>
                          
                        <div>
                            <span class="t">ところで、</span> 
                            <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black mt-3" href="{{ route('drinks.create') }}">君は今日何を飲んだ?</a></div>
                        </div>
                    </div>

                </div>
            </div>
            <label for="carousel-3" class="prev control-1 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-2" class="next control-1 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900 leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 2-->
            <input class="carousel-open" type="radio" id="carousel-2" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0 bg-cover bg-right" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-right" style="">

                    <div class="container mx-auto">
                        <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                            <p class="text-black text-2xl my-4">人生はチョコレートの箱のようなもの。
                                <br> 開けてみるまで中身はわからない。</p>
                            <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black" href="{{ route('drinks.create') }}">-フォレストガンプ-</a>
                        </div>
                    </div>

                </div>
            </div>
            <label for="carousel-1" class="prev control-2 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-3" class="next control-2 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!--Slide 3-->
            <input class="carousel-open" type="radio" id="carousel-3" name="carousel" aria-hidden="true" hidden="">
            <div class="carousel-item absolute opacity-0" style="height:50vh;">
                <div class="block h-full w-full mx-auto flex pt-6 md:pt-0 md:items-center bg-cover bg-bottom" style="">

                    <div class="container mx-auto">
                        <div class="flex flex-col w-full lg:w-1/2 md:ml-16 items-center md:items-start px-6 tracking-wide">
                            <p class="text-black text-2xl my-4">俺の酒も甘い</p>
                            <a class="text-xl inline-block no-underline border-b border-gray-600 leading-relaxed hover:text-black hover:border-black" href="{{ route('drinks.create') }}">パクさん
                            </a>
                        </div>
                    </div>

                </div>
            </div>
            <label for="carousel-2" class="prev control-3 w-10 h-10 ml-2 md:ml-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 left-0 my-auto">‹</label>
            <label for="carousel-1" class="next control-3 w-10 h-10 mr-2 md:mr-10 absolute cursor-pointer hidden text-3xl font-bold text-black hover:text-white rounded-full bg-white hover:bg-gray-900  leading-tight text-center z-10 inset-y-0 right-0 my-auto">›</label>

            <!-- Add additional indicators for each slide-->
            <ol class="carousel-indicators">
                <li class="inline-block mr-3">
                    <label for="carousel-1" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-2" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
                <li class="inline-block mr-3">
                    <label for="carousel-3" class="carousel-bullet cursor-pointer block text-4xl text-gray-400 hover:text-gray-900">•</label>
                </li>
            </ol>

        </div>
    </div>

 	   <section class="bg-white py-8">

        <div  class="container mx-auto flex items-center flex-wrap pt-4 pb-12">

            <div  class="w-full z-30 top-0 px-6 py-1">
                <div class="w-full container mx-auto flex  items-center justify-end mt-0 px-2 py-3">
                    <div class="flex items-center " id="store-nav-content">

                        <form action="{{ route('item.search') }}">
                            <i class="fas fa-search "> </i>
                            <input type="text" name="query" class=" text-sm rounded-full w-64 px-4  py-1 focus:outline-none border-b focus:shadow-outline " placeholder=" Search">
                          </form>
                       
                    </div>
              </div>
            </div>
            @foreach ($drinks as $drink)
            <div class="w-1/2 md:w-1/3 xl:w-1/4 p-6 flex flex-col  inline-block">
            
                <a href="{{ route('drinks.show', $drink) }}">  

                <img src="{{asset('/storage/image/'.$drink->image)  }}" alt="pic"  class="item-image hover:opacity-75 transition ">
                    <div class="pt-3 flex items-center justify-between">
                        <p class="drink-name">{{ $drink->name }}</p>
                   
                    </div>
                    <p class="pt-1 text-gray-900 ">
                        <i class="fas fa-star text-yellow-300"></i>
                        {{ $drink->score }}</p>
                    <div class="body-box ">
                        <p class="drink-place">買った店：{{ $drink->place }}</p>
                    <p class="mt-2 drink-text">{{ $drink->body }}</p>
                    </div>
                    </a>
                {{-- Vue --}}
                @if (Auth::check())
                <div class="panel-footer">
                    <favorite-btn
                        :drink={{ $drink->id }}
                        :favorited={{ $drink->favorited() ? 'true' : 'false' }}
                    ></favorite-btn>
                 
                </div>
               @endif
                {{-- Vue --}}
            </div>
            @endforeach
            </div>
   
            {{ $drinks->links() }}
    </section>

    <section class="bg-white py-8">

        <div class="container py-8 px-6 mx-auto">

            <a class="tracking-wide no-underline hover:no-underline font-bold text-gray-800 text-xl mb-8" href="#">
			
		</a>
            <p class="mb-8 footer-tesxt"> 世の中には飲んだことのない飲み物が無数にある。<br> 何が美味しいかなんて飲んでみないとわからない。
            <br> 不味いかもしれない。苦いかもしれない。甘すぎるかもしれない。<br> それでもたまには美味しいものに出会えるよ。たぶん。</p>
            
        </div>

    </section>

    <footer class="container mx-auto bg-white py-8  border-gray-400">
        <div class="container flex px-3 py-8 ">
            <div class="w-full mx-auto flex flex-wrap">
                <div class="flex w-full lg:w-1/2 ">
             
                </div>
                <div class="flex w-full lg:w-1/2 lg:justify-end lg:text-right">
           
                </div>
            </div>
        </div>
    </footer>

@endsection