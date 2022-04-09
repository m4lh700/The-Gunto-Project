@props(['data'])

<div class="hidden lg:sticky top-28 lg:block lg:self-start mt-20">
  <div class="justify-center text-center mb-14">
    @if ($data->avatar)
        <img class="mx-auto my-auto h-32 w-32 rounded-full overflow-hidden shadow mb-4" src="{{ $data->avatar }}" alt="User avatar">
    @else
        <svg xmlns="http://www.w3.org/2000/svg" class="mx-auto my-auto h-32 w-32 rounded-full overflow-hidden shadow mb-4 bg-gray-100" viewBox="0 0 20 20" fill="currentColor">
          <path fill-rule="evenodd" d="M18 10a8 8 0 11-16 0 8 8 0 0116 0zm-6-3a2 2 0 11-4 0 2 2 0 014 0zm-2 4a5 5 0 00-4.546 2.916A5.986 5.986 0 0010 16a5.986 5.986 0 004.546-2.084A5 5 0 0010 11z" clip-rule="evenodd" />
        </svg>
    @endif
    <span class="font-bold text-xl">{{ $data->name }}</span>
    <br>
    <div class="relative flex">
      @for($i = 0; $i < $data->stars; $i++)
        <x-heroicon-s-star class="w-6 h-6 mr-1 float-left mx-auto my-auto"/>
      @endfor
    </div>
    Views: {{ $data->view_count }}
</div>

  <livewire:favorite-smith
              :model="$data"
              smith_id="{{ $data->id }}"/>

  <ul class="hide-scrollbar mobile:hidden lg:max-h-[80vh] lg:overflow-y-auto">
    <li>
      <a href="{{ route('indexsmiths') }}" class="mb-[5px] flex items-center rounded-xl border py-25 px-6 bg-blue-500 hover:bg-blue-400 text-white text-lg">
        <x-heroicon-s-arrow-left class="w-6 h-6 mr-1 float-left"/>Back to list
      </a>
    </li>
  </ul>
  <ul class="hide-scrollbar mobile:hidden lg:max-h-[80vh] lg:overflow-y-auto">
    <li @click="openTab = 1" :class="{ '-mb-px': openTab === 1 }">
      <a :class="openTab === 1 ? activeClasses : inactiveClasses" href="#about" class="mb-[5px] flex items-center rounded-xl border py-25 px-6 bg-teal-500 hover:bg-teal-700 text-white text-lg">
        <x-heroicon-s-information-circle class="w-6 h-6 mr-1 float-left"/>About
      </a>
    </li>
  </ul>
  <ul class="hide-scrollbar mobile:hidden lg:max-h-[80vh] lg:overflow-y-auto">
    <li @click="openTab = 2" :class="{ '-mb-px': openTab === 2 }">
      <a :class="openTab === 2 ? activeClasses : inactiveClasses" href="#swords" class="mb-[5px] flex items-center rounded-xl border py-25 px-6 bg-teal-500 hover:bg-teal-700 text-white text-lg">
        <x-heroicon-s-star class="w-6 h-6 mr-1 float-left"/>Swords ({{ $data->swords->count() }})
      </a>
    </li>
  </ul>
  <ul class="hide-scrollbar mobile:hidden lg:max-h-[80vh] lg:overflow-y-auto">
    <li @click="openTab = 3" :class="{ '-mb-px': openTab === 3 }">
      <a :class="openTab === 3 ? activeClasses : inactiveClasses" href="#discussion" class="mb-[5px] flex items-center rounded-xl border py-25 px-6 bg-teal-500 hover:bg-teal-700 text-white text-lg">
        <x-heroicon-s-chat-alt-2 class="w-6 h-6 mr-1 float-left"/>Discussion
      </a>
    </li>
  </ul>
  <ul class="hide-scrollbar mobile:hidden lg:max-h-[80vh] lg:overflow-y-auto">
    <li @click="openTab = 4" :class="{ '-mb-px': openTab === 4 }">
      <a :class="openTab === 4 ? activeClasses : inactiveClasses" href="#oshigata" class="mb-[5px] flex items-center rounded-xl border py-25 px-6 bg-teal-500 hover:bg-teal-700 text-white text-lg">
        <x-heroicon-s-photograph class="w-6 h-6 mr-1 float-left"/>Oshigata
      </a>
    </li>
  </ul>
</div>
