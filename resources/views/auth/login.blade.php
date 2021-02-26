  
@extends('layouts.default')

@section('contents')


<div class="flex items-center justify-center mt-5 ">
    
    <div class="w-2/3 lg:w-1/2 xl:max-w-screen-sm bg-white shadow px-4 py-2 rounded-md">
       
        <div class=" md:px-48 lg:px-12 lg:mt-16 xl:px-24  xl:max-w-2xl">
            <a href="{{ route('drinks.index') }}"> 
                <i class="fas fa-wine-glass-alt"></i></a>  
            <P class="text-center text-gray-700   lg:text-left font-bold ">ログイン</P>
         
            <div class="  mt-10">
                     <form method="POST" action="{{ route('login') }}">
                    @csrf
                                  
                    @error('email')
                    <span class="text-red-500" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                      @enderror

                    <div>
                        <div class="text-sm font-bold text-gray-700 tracking-wide">メールアドレス</div>
                        <input class=" text-lg py-2 border-b border-gray-300 focus:outline-none focus:border-indigo-500 form-control @error('email') is-invalid @enderror" type="email" name="email" placeholder="メールアドレス" value="{{ old('email') }}" >
                    </div>

                    @error('password')
                    <span class="invalid-feedback" role="alert">
                        <strong>{{ $message }}</strong>
                    </span>
                    @enderror
                    {{-- @foreach($errors->all() as $error)
                    <li>{{ $error }}</li>
                   @endforeach --}}

                    <div class="mt-8">

                        
                        <div class="flex justify-between items-center">
                            <div class="text-sm font-bold text-gray-700 tracking-wide">
                                パスワード
                            </div>
                            
                        </div>
                        <input class=" text-lg py-2  focus:outline-none  border-b focus:border-indigo-500 form-control @error('password') is-invalid @enderror" type="password"  placeholder="パスワード" value="{{ old('password') }}" name="password">
                    </div>
                    <div class="mt-10">
                        <button class=" p-4 w-full rounded-full tracking-wide
                        font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-gray-200
                        shadow-lg">
                        ログイン
                        </button>
                    </div>
                </form>
                <div class="mt-2 text-sm font-display font-semibold text-gray-700 text-center">
                    アカウントをお持ちでない方はこちら<a class="cursor-pointer ml-2 border-b text-gray-500" href="{{ 'register' }}">登録</a>
                </div>
           
                {{-- テストボタン --}}
                <div class="mb-2 ml-2">
                  <form method="POST" action="{{ route('login') }}">
                    @csrf
                    <div>
                        <input class="" type="hidden" name="email" 
                        value="test1@test.com" >
                    </div>
                        <input class="" type="hidden"  value="12345678910" name="password">
                  
                    <div class="mt-2">
                        <button class="bg-green-300 px-2 text-gray-100 rounded-full tracking-wide
                        font-semibold font-display focus:outline-none focus:shadow-outline hover:bg-green-500
                        shadow-lg"> とりあえず何か飲んだから書く
                    
                        </button>
                    </div>  
                </form>
            </div>
              {{-- テストボタン --}}
            </div>
          
            </div>
        </div>
    </div>
    

@endsection