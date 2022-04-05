@props(['smith'])

<a href="{{ route('showsmith', ['slug' => $smith->slug]) }}">
    <div class="max-w-sm rounded overflow-hidden shadow-lg">
      @if($smith->avatar)
        <img class="w-full" src="{{ $smith->avatar}}" alt="{{ $smith->name }}" loading=lazy>
      @else
        <img class="w-full" src="https://photos.smugmug.com/Galleries/Japan/i-d8P3XMn/0/a0d800bf/L/japan%20Smugmug%202--L.jpg" alt="{{ $smith->name }}" loading=lazy>
      @endif
      <div class="px-6 py-4">
        <div class="font-bold text-xl mb-2">{{ $smith->name }}</div>
        @for($i = 0; $i < $smith->stars; $i++)
          <x-heroicon-s-star class="w-6 h-6 mr-1 float-left mx-auto my-auto"/>
        @endfor
        <br>
        <p class="text-gray-700 text-base">
          {{ $smith->short_description }}
        </p>
      </div>
      <div class="px-6 pt-4 pb-2">
        @if($smith->rjt)
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#rjt</span>
        @endif
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Views: @if($smith->view_count) {{ $smith->view_count }} @else 0 @endif</span>
          <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Swords: @if($smith->swords->count()) {{ $smith->swords->count() }} @else 0 @endif</span>
      </div>
  </div>
</a>
