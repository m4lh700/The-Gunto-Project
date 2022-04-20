@extends('layouts.master')

@section('body')
<x-head height="calc(100vh / 3 * 2)" img="https://wallpaperaccess.com/full/14399.jpg" title="Smiths Database" text="" searchbar=true />

<div class="min-h-screen container mx-auto mt-4 p-4 md:p-0">
  <div class="mt-20 grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    @foreach($data as $smith)
      <a href="{{ route('showsword', ['slug' => $smith->smith->slug ,'id' => $smith->id]) }}">
        <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white hover:bg-teal-500 hover:text-white transition ease-in-out duration-300">
            <img class="hidden md:block h-48 w-96 object-cover" src="https://photos.smugmug.com/Galleries/Japan/i-d8P3XMn/0/a0d800bf/L/japan%20Smugmug%202--L.jpg" alt="{{ $smith->smith->name }}" loading=lazy>
          <div class="px-6 py-4">
            <div class="font-bold text-2xl mb-2 dark:text-black">
                @if($smith->sword_type == 0)
                    Unknown by {{ $smith->smith->name }}
                @elseif($smith->data == 1)
                    Gendaito by {{ $smith->smith->name }}
                @elseif($smith->sword_type == 2)
                    Showato by {{ $smith->smith->name }}
                @elseif($smith->sword_type == 3)
                    Ersatz by {{ $smith->smith->name }}
                @endif
            </div>
          </div>
          <div class="px-6 pt-4 pb-2">
          </div>
      </div>
    </a>
    @endforeach
  </div>
</div>
@endsection
