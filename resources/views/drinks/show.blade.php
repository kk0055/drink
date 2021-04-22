
@extends('layouts.default')
@section('contents')

@include('nav')

<div class="drink-show w-1/2 md:w-1/3 xl:w-1/4 p-6 flex flex-col shadow wrap">
  <a href="{{asset('/storage/image/'.$drink->image)  }}" >
     <img src="{{asset('/storage/image/'.$drink->image)  }}" alt="pic"  class=" hover:opacity-75 show-item-image"></a>
        <div class="pt-3 flex items-center ">
            <p class="">{{ $drink->name }}</p>
           
          </div>
          <div class="flex pt-1 mt-2 mb-2 text-gray-900">
            <p class="">
            <i class="fas fa-star text-yellow-300"></i> 
            {{ $drink->score }}</p>
               {{-- Vue --}}
       @if (Auth::check())
      <div class="ml-5">
          <favorite-btn
              :drink={{ $drink->id }}
              :favorited={{ $drink->favorited() ? 'true' : 'false' }}
          ></favorite-btn>
          {{ $count }}
       
        </div>
        @else
        <div class="ml-5">
        <i class="far fa-heart ml-2"></i> {{ $count }}
       </div>
      @endif
      {{-- Vue --}}
    </div>
   
        <p class="mt-1 mb-1 " >買った店 : {{ $drink->place }}</p>
        <p class="my-2">{{$drink->body }}</p>
     
  
 
        @auth
        @if ($drink->user->id === Auth::user()->id)
        <div class="flex justify-end ">
            
          <form action="{{ route('drinks.destroy', $drink) }}" method="post" class="mr-1">
            @csrf
            @method('DELETE')
            
            <button type="submit" class="inline-flex mb-2 py-2 px-2 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-black hover:bg-black focus:outline-none "  onclick="return confirm('本当に消しても大丈夫?')">削除</button>
          </form>
          <a type="submit" class="inline-flex mb-2 py-2 px-2  shadow-sm text-sm font-medium rounded-md text-white bg-black hover:bg-black focus:outline-none "  href="{{ route('drinks.edit',$drink) }}">編集</a>
          
          @endif
          @endauth
</div>
</div>

@endsection