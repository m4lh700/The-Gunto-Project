<div>
<a href="{{ route('showsword', ['slug' => $sword->smith->slug ,'id' => $sword->id]) }}">
    <div class="max-w-sm rounded overflow-hidden shadow-lg bg-white hover:bg-teal-500 hover:text-white transition ease-in-out duration-300">
      @if($sword->main_image)
        <!--<img class="hidden md:block h-48 w-96 object-cover" src="{{ $sword->avatar}}" alt="{{ $smith->name }}" loading=lazy>-->
      @else
        <img class="hidden md:block h-48 w-96 object-cover" src="https://photos.smugmug.com/Galleries/Japan/i-d8P3XMn/0/a0d800bf/L/japan%20Smugmug%202--L.jpg" alt="{{ $sword->name }}" loading=lazy>
      @endif
      <div class="px-6 py-4">
        <div class="font-bold text-2xl mb-2 dark:text-black">
            @if($sword->sword_type == 0)
                Unknown by {{ $sword->smith->name }}
            @elseif($sword->sword_type == 1)
                Gendaito by {{ $sword->smith->name }}
            @elseif($sword->sword_type == 2)
                Showato by {{ $sword->smith->name }}
            @elseif($sword->sword_type == 3)
                Ersatz by {{ $sword->smith->name }}
            @endif
        </div>
      </div>
      <div class="px-6 pt-4 pb-2">
      </div>
  </div>
</a>
</div>
