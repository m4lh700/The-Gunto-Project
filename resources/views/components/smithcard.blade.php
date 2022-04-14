@props(['smith'])
<div>
@if(Auth()->user())
  <a class="absolute bg-blue-600 hover:bg-red-400 rounded-full text-sm font-semibold text-white m-2 px-2 text-xl" href="{{ route('addfavoritesmith', ['id' => $smith->id]) }}">&#43;</a>
@endif
<a href="{{ route('showsmith', ['slug' => $smith->slug]) }}">
    <div class="pt-8 max-w-sm rounded overflow-hidden shadow-lg bg-white hover:bg-teal-500 hover:text-white transition ease-in-out duration-300">
      @if($smith->avatar)
        <!--<img class="hidden md:block h-48 w-96 object-cover" src="{{ $smith->avatar}}" alt="{{ $smith->name }}" loading=lazy>-->
      @else
        <!--<img class="hidden md:block h-48 w-96 object-cover" src="https://photos.smugmug.com/Galleries/Japan/i-d8P3XMn/0/a0d800bf/L/japan%20Smugmug%202--L.jpg" alt="{{ $smith->name }}" loading=lazy>-->
      @endif
      <div class="px-6 py-4">
        <div class="font-bold text-2xl mb-2 dark:text-black">{{ $smith->name }}</div>
        @for($i = 0; $i < $smith->stars; $i++)
          <x-heroicon-s-star class="w-6 h-6 mr-1 float-left mx-auto my-auto dark:text-black"/>
        @endfor
        <br>
        <p class="text-base">
          {{-- $smith->short_description --}}
        </p>
      </div>
      <div class="px-6 pt-4 pb-2">
        @if($smith->rjt)
          <span class="inline-block bg-teal-500 rounded-full px-3 py-1 text-sm font-semibold text-white mr-2 mb-2">#rjt</span>
        @endif
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Views: @if($smith->view_count) {{ $smith->view_count }} @else 0 @endif</span>
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Swords: @if($smith->swords->count()) {{ $smith->swords->count() }} @else 0 @endif</span>
      </div>
  </div>
</a>
</div>
