  @if(Auth::user())
    <ul wire:click="favorite( {{$smith_id}} );" class="hide-scrollbar mobile:hidden lg:max-h-[80vh] lg:overflow-y-auto">
      <li>
        <a href="#favorite" class="mb-[5px] flex items-center rounded-xl border py-25 px-6 bg-blue-600 hover:bg-blue-300 text-white text-lg">
          @if($favorite == false)
            <x-heroicon-o-star class="w-6 h-6 mr-1 float-left"/>
          @elseif($favorite == true)
            <x-heroicon-s-star class="w-6 h-6 mr-1 float-left"/>
          @endif
            Favorite
        </a>
      </li>
    </ul>
  @endif

