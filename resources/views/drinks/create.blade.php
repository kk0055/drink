
@extends('layouts.default')

@section('contents')

<div class="mt-1 md:mt-0 md:col-span-2 max-w-3xl mx-auto  p-16">

  <form action="{{ route('drinks.store') }}" method="POST" enctype="multipart/form-data">
    @csrf
    <div class="shadow overflow-hidden sm:rounded-md">
      <div class="px-4 py-5 bg-white sm:p-6">
        <div class="create-text flex flex-col w-full items-center  px-6 tracking-wide">
          @guest
          <div class="text-red-500" role="alert">
             <p>※ログインしてないと投稿できないよ～<br>ログインするか？<i class="fas fa-hand-point-right"></i> 
            <a href="{{ route('login') }}" class="text-black">ログイン</a></p>
             
          </div>
         @endguest
         
          </div>
        

          <div class="col-span-6">
        
            <label for="name" class="block text-sm font-medium text-gray-700">飲んだもの</label>
            <input type="text" name="name"  class="mt-1 p-1 focus:outline-none focus:ring  block w-full shadow-sm sm:text-sm rounded-md border border-indigo-600" placeholder="" value="{{ old('name') }}" >
          </div>
          @error('name')
          <div class="text-red-500 mb-2 text-sm">
            {{ $message }}
          </div>
          @enderror

          <div class="col-span-6 mt-3">
        
            <label for="place" class="block text-sm font-medium text-gray-700">買える場所</label>
            <input type="text" name="place"   class="mt-1 p-1 focus:outline-none focus:ring  block w-full shadow-sm sm:text-sm rounded-md border border-indigo-600" placeholder="" value="{{ old('place') }}" >
          </div>
          @error('place')
          <div class="text-red-500 mb-2 text-sm">
            {{ $message }}
          </div>
          @enderror
          {{-- Body --}}

             

          <div class="col-span-6 mt-3 sm:col-span-6 lg:">
            <label for="body" class="block text-sm font-medium text-gray-700 ">感想</label>
            <textarea type="text" name="body" id="body" class=" w-5  focus:outline-none	 w-full shadow-sm sm:text-sm border-gray-300 rounded-md border border-indigo-600"  rows="5"  placeholder=" 詳細をご記入ください" value="" > {{ old('body') }}</textarea>
            
            @error('body')
            <div class="text-red-500 mb-2 text-sm">
              {{ $message }}
            </div>
            @enderror 

          </div>
          <div class="col-span-6 mt-3 sm:col-span-6 ">
          <label>何点？</label>
          <select class="form-control" name="score">
            <option value="" selected>---------------</option>                   
          <option value="1" name="score">1</option>
          <option value="2" name="score">2</option>
          <option value="3" name="score">3</option>
          <option value="4" name="score">4</option>
          <option value="5" name="score">5</option>
          <option value="6" name="score">6</option>
          <option value="7" name="score">7</option>
          <option value="8" name="score">8</option>
          <option value="9" name="score">9</option>
          <option value="10" name="score">10</option>
          
          </select>
          </div>
     
        @error('score')
        <div class="text-red-500 mb-2 text-sm">
          {{ $message }}
        </div>
        @enderror 
          {{-- image --}}
          <div class="col-span-6 sm:col-span-6 lg:col-span-2 mt-3">
            <label for="image" class="block text-sm font-medium text-gray-700">写真</label>
            <input type="file" name="image" id="filename" class="focus:outline-none " >
          </div>

          
          @error('image')
          <div class="text-red-500 mt-2 text-sm">
            {{ $message }}
          </div>
          @enderror  
    

        {{-- End of Body --}}
    
        </div>
      </div>
    {{-- ログインしていないとき --}}
    @guest
    <div class="px-4 py-3 bg-white text-right sm:px-6">
      <button type="submit" class="inline-flex  justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2 bg-black"  onclick="loginAlert()" >
        Go!!
      </button>
    </div>
   @endguest
    {{-- ログインしてるとき --}}
    @auth
      <div class="px-4 py-3 bg-white text-right sm:px-6">
        <button type="submit" class="inline-flex  justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white focus:outline-none focus:ring-2 focus:ring-offset-2 bg-black" >
          Go!!
        </button>
      </div>
      @endauth
    </div>
  </form>
</div>



    
@endsection
