
<section class="bg-white py-8">

  <div class="container mx-auto flex items-center flex-wrap pt-4 pb-12">
      @foreach ($drinks as $drink)
      <div class="w-1/2 md:w-1/3 xl:w-1/4 p-6 flex flex-col  inline-block">   
          <a href="{{ route('drinks.show', $drink) }}">  
          <img src="{{asset('/storage/image/'.$drink->image)  }}" alt="pic"  class="item-image hover:opacity-75 transition ">
              <div class="pt-3 flex items-center justify-between">
                  <p class="drink-name">{{ $drink->name }}</p>
               
              </div>
              <p class="pt-1 text-gray-900">
                  <i class="fas fa-star text-yellow-300"></i>
                  {{ $drink->score }}</p>
              <div class="body-box ">
                <p class="drink-place">買った店：{{ $drink->place }}</p>
              <p class="drink-text">{{ $drink->body }}</p>
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
