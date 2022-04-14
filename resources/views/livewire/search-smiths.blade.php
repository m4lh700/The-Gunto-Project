<form class="w-full lg:w-[50rem]" action="{{ route('searchsmiths') }}">
  <div class="flex items-center border-b border-teal-500 py-4 flex-wrap md:flex-nowrap">
    <input class="appearance-none bg-white border-none rounded w-full text-gray-700 mr-0 md:mr-3 mb-2 md:mb-0 py-4 px-4 leading-tight focus:outline-none w-full" type="text" placeholder="Search smith..." aria-label="Full name" name="smith" wire:model="smith">
    <button class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-3 px-4 rounded w-full md:w-auto" type="submit">
      <span>Search database</span>
    </button>
    @if($searchresults)
    <ul class="appearance-none bg-white border-none rounded text-gray-700 leading-tight focus:outline-none absolute flex flex-row flex-wrap shadow basis-full my-auto w-full lg:w-[50rem]" style="top:462px;">
      @foreach($searchresults as $result)
          <li class="hover:bg-teal-500 hover:text-white py-4 px-4 border" id="{{ $result->id }}" wire:click="selectOption( '{{$result['name']}}');">#{{ $result['name'] }}</li>
      @endforeach
    </ul>
    @endif
  </div>
</form>
