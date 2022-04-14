@extends('layouts.master')

@section('body')
<x-head height="calc(100vh / 3 * 2)" img="https://wallpaperaccess.com/full/14399.jpg" title="My Favorite smiths" text="" searchbar=true />

<div class="min-h-screen container mx-auto mt-4 p-4 md:p-0">
  <div class="md:mt-20 grid grid-cols-1 md:grid-cols-4 gap-4">
    @foreach($data as $smith)
    <div>
        <a class="absolute inline-block bg-red-600 hover:bg-red-400 rounded-full text-sm font-semibold text-white m-2 py-1 px-2" href="{{ route('removefavoritesmith', ['id' => $smith->smith->id]) }}">&#10005;</a>
      <a href="{{ route('showsmith', ['slug' => $smith->smith->slug]) }}">
        <div class="pt-8 max-w-sm rounded overflow-hidden shadow-lg bg-white hover:bg-teal-500 hover:text-white transition ease-in-out duration-300">
          @if($smith->smith->avatar)
            <!--<img class="hidden md:block h-48 w-96 object-cover" src="{{ $smith->smith->avatar}}" alt="{{ $smith->smith->name }}" loading=lazy>-->
          @else
            <!--<img class="hidden md:block h-48 w-96 object-cover" src="https://photos.smugmug.com/Galleries/Japan/i-d8P3XMn/0/a0d800bf/L/japan%20Smugmug%202--L.jpg" alt="{{ $smith->name }}" loading=lazy>-->
          @endif
          <div class="px-6 py-4">
            <div class="font-bold text-2xl mb-2">{{ $smith->smith->name }}</div>
            @for($i = 0; $i < $smith->smith->stars; $i++)
              <x-heroicon-s-star class="w-6 h-6 mr-1 float-left mx-auto my-auto"/>
            @endfor
            <br>
            <p class="text-gray-700 text-base">
              {{-- $smith->smith->short_description --}}
            </p>
          </div>
          <div class="px-6 pt-4 pb-2">
            @if($smith->smith->rjt)
              <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">#rjt</span>
            @endif
              <span class="inline-block bg-gray-200 rounded-full px-3 py-1 text-sm font-semibold text-gray-700 mr-2 mb-2">Views: @if($smith->smith->view_count) {{ $smith->smith->view_count }} @else 0 @endif</span>
            </div>
        </div>
      </a>
      </div>
    @endforeach
  </div>
</div>
@endsection
