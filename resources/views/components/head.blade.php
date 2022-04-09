@props(['img', 'height', 'text', 'title', 'searchbar' => false, 'back' => false, 'nextsmith' => false, 'previoussmith' => false])

  <div class="w-full bg-cover bg-fixed bg-center" style="height:{{ $height  }}; background-image: url( @if($img) {{$img}} @endif  );">
  <div class="flex items-center justify-center h-full w-full bg-gray-900 bg-opacity-80 p-4">
    <div class="text-center md:w-[50rem]">
      <h1 class="text-white text-2xl font-semibold uppercase md:text-4xl">{{ $title }}</h1>
      <p class="text-white font-light">{{ $text }}</p>
      @if($back == true)
        <a href="{{ route('showsmith', ['slug' => $previoussmith]) }}" class="hidden md:block absolute mx-auto flex items-center mt-[-30px] py-25 px-6 text-white text-normal hover:text-teal-500 md:left-20 lg:left-96">
          <x-heroicon-s-arrow-left class="w-6 h-6 mr-1 float-left"/>Previous
        </a>
        <a href="{{ route('showsmith', ['slug' => $nextsmith]) }}" class="hidden md:block absolute mx-auto flex items-center mt-[-30px] py-25 px-6 text-white text-normal hover:text-teal-500 md:right-20 lg:right-96">
          <x-heroicon-s-arrow-right class="w-6 h-6 ml-1 float-right"/>Next
        </a>
      @endif
      @if($searchbar == true)
        <livewire:search-smiths />
      @endif
    </div>
  </div>
</div>
