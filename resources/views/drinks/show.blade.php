
@extends('layouts.default')
@section('contents')

@include('nav')

<div class="drink-show w-1/2 md:w-1/3 xl:w-1/4 p-6 flex flex-col shadow">
     <img src="{{asset('/storage/image/'.$drink->image)  }}" alt="pic"  class=" hover:opacity-75 show-item-image">
        <div class="pt-3 flex items-center ">
            <p class="">{{ $drink->name }}</p>
           
          </div>
            <p class="pt-1 mt-2 mb-2 text-gray-900">
            <i class="fas fa-star text-yellow-300"></i> 
            {{ $drink->score }}</p>
          
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

@endsection