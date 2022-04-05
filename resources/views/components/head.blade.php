@props(['img', 'height', 'text', 'title', 'searchbar' => false])

  <div class="w-full bg-cover bg-fixed bg-center" style="height:{{ $height  }}; background-image: url( @if($img) {{$img}} @endif  );">
  <div class="flex items-center justify-center h-full w-full bg-gray-900 bg-opacity-80 p-4">
    <div class="text-center md:w-[50rem]">
      <h1 class="text-white text-2xl font-semibold uppercase md:text-3xl">{{ $title }}</h1>
      <p class="text-white font-light">{{ $text }}</p>
      @if($searchbar == true)
        <livewire:search-smiths />
      @endif
    </div>
  </div>
</div>
