@extends('layouts.master')

@section('body')
  <x-head height="calc(100vh / 3 * 2)" img="https://www.samuraimuseum.jp/shop/wp-content/uploads/2021/01/DSC00005_toshin.jpg" title="{{ $data->name }}" text="" back="true" nextsmith={{$nextsmith}} previoussmith={{$previoussmith}} />

<div class="hidden container mx-auto bg-teal-500 md:mt-[-60px] md:flex md:flex-row p-4 text-white shadow-lg">
  <div class="basis-1/4 p-4 border-r border-teal-400 my-auto">
    <p class="uppercase text-xl">@if($data->rjt) Yes @else No @endif</p>
    <p class="font-thin text-sm">Rikugun Jumei Tosho</p>
  </div>
  <div class="basis-1/4 p-4 border-r border-teal-400 my-auto">
    <p class="uppercase text-xl">
      @if($data->stars == 1)
        low grade
      @elseif($data->stars == 2)
        avegare grade
      @elseif($data->stars == 3)
        medium grade
      @elseif($data->stars == 4)
        high grade
      @elseif($data->stars == 5)
        superior grade
      @else
        unknown
      @endif
    </p>
  <p class="font-thin text-sm">Rating</p>
</div>
  <div class="basis-1/4 p-4 border-r border-teal-400 my-auto">
    <p class="uppercase text-xl">Books</p>
    <p class="font-thin text-sm">References</p>
  </div>
  <div class="basis-1/4 p-4 my-auto">
    <a href="{{ route('swordsubmit', ['slug' => $data->slug]) }}">
      <button class="flex items-center rounded-xl py-25 px-6 bg-blue-500 hover:bg-teal-700 text-white text-lg text-white">&#43; submit sword</button>
    </a>
  </div>
</div>

<div class="min-h-screen container mx-auto flex justify-between" x-data="{
      openTab: 1,
      activeClasses: 'text-black',
      inactiveClasses: ''
    }">

  <!-- Smith profile component-->
  <x-smithprofile :data=$data />
  <!-- End Smith profile component-->

  <div class="mx-auto w-full lg:ml-20 md:flex-1 lg:mt-20 lg:p-0 p-4">
    <div id="about" x-show="openTab === 1">@include('smith/tab_about')</div>
    <div id="swords" x-show="openTab === 2">@include('smith/tab_swords')</div>
    <div id="discussion" x-show="openTab === 3">@include('smith/tab_discussion')</div>
    <div id="oshigata" x-show="openTab === 4">@include('smith/tab_oshigata')</div>
  </div>

</div>
@endsection
