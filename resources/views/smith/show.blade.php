@extends('layouts.master')

@section('body')
  <x-head height="calc(100vh / 3 * 1)" img="https://wallpaperaccess.com/full/14399.jpg" title="Smith: {{ $data->name }}" text="" />

<div class="h-screen container mx-auto flex justify-between">

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
        <x-heroicon-s-star class="w-6 h-6 mr-1 float-left mx-auto my-auto"/>
        <x-heroicon-s-star class="w-6 h-6 mr-1 float-left mx-auto my-auto"/>
        <x-heroicon-s-star class="w-6 h-6 mr-1 float-left mx-auto my-auto"/>
        <x-heroicon-s-star class="w-6 h-6 mr-1 float-left mx-auto my-auto"/>
        <x-heroicon-s-star class="w-6 h-6 mr-1 float-left mx-auto my-auto"/>
      </div>
  </div>

    <ul class="hide-scrollbar mobile:hidden lg:max-h-[80vh] lg:overflow-y-auto">
      <li>
        <a href="{{ route('indexsmiths') }}" class="mb-[5px] flex items-center rounded-xl border py-25 px-6 bg-blue-400 hover:bg-blue-lighter text-white text-lg">
          <x-heroicon-s-arrow-left class="w-6 h-6 mr-1 float-left"/>Back
        </a>
      </li>
    </ul>
    <ul class="hide-scrollbar mobile:hidden lg:max-h-[80vh] lg:overflow-y-auto">
      <li>
        <a href="" class="mb-[5px] flex items-center rounded-xl border py-25 px-6 bg-teal-500 hover:bg-blue-lighter text-white text-lg">
          <x-heroicon-s-information-circle class="w-6 h-6 mr-1 float-left"/>About
        </a>
      </li>
    </ul>
    <ul class="hide-scrollbar mobile:hidden lg:max-h-[80vh] lg:overflow-y-auto">
      <li>
        <a href="" class="mb-[5px] flex items-center rounded-xl border py-25 px-6 bg-teal-500 hover:bg-blue-lighter text-white text-lg">
          <x-heroicon-s-star class="w-6 h-6 mr-1 float-left"/>Swords
        </a>
      </li>
    </ul>
    <ul class="hide-scrollbar mobile:hidden lg:max-h-[80vh] lg:overflow-y-auto">
      <li>
        <a href="" class="mb-[5px] flex items-center rounded-xl border py-25 px-6 bg-teal-500 hover:bg-blue-lighter text-white text-lg">
          <x-heroicon-s-chat-alt-2 class="w-6 h-6 mr-1 float-left"/>Discussion
        </a>
      </li>
    </ul>
    <ul class="hide-scrollbar mobile:hidden lg:max-h-[80vh] lg:overflow-y-auto">
      <li>
        <a href="" class="mb-[5px] flex items-center rounded-xl border py-25 px-6 bg-teal-500 hover:bg-blue-lighter text-white text-lg">
          <x-heroicon-s-photograph class="w-6 h-6 mr-1 float-left"/>Oshigata
        </a>
      </li>
    </ul>
  </div>


  <div class="mx-auto w-full ml-20 md:flex-1 mt-20 bg-gray-100">MAIN
    {{ $data->description }}
  </div>

</div>
@endsection
