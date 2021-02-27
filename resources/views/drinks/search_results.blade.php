@extends('layouts.default')
@section('contents')
@include('nav')

@if (!$drinks->count())
<div class="search-text flex flex-col w-full items-center  px-6 tracking-wide">
<p>検索した飲み物はまだ無いみたいだね！<br> 君が飲んでみてくれ！
  
  <a class="hover:no-underline font-bold text-gray-800 text-xl " href="{{ route('drinks.index') }}">
  <i class="fas fa-wine-bottle"></i>
</a></p>

</div>

@else

@include('components.drink')

@endif
</div>

</section>

@endsection