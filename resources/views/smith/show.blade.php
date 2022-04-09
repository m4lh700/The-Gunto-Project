@extends('layouts.master')

@section('body')
  <x-head height="calc(100vh / 3 * 1)" img="https://wallpaperaccess.com/full/14399.jpg" title="Smith: {{ $data->name }}" text="" />

<div class="h-screen container mx-auto flex justify-between" x-data="{
      openTab: 1,
      activeClasses: 'text-black',
      inactiveClasses: ''
    }">
  <!-- Smith profile component-->
  <x-smithprofile :data=$data />
  <!-- End Smith profile component-->

  <div class="mx-auto w-full md:ml-20 md:flex-1 md:mt-20 md:p-0 p-4">
    <div id="about" x-show="openTab === 1">@include('smith/tab_about')</div>
    <div id="swords" x-show="openTab === 2">@include('smith/tab_swords')</div>
    <div id="discussion" x-show="openTab === 3">@include('smith/tab_discussion')</div>
    <div id="oshigata" x-show="openTab === 4">@include('smith/tab_oshigata')</div>
  </div>

</div>
@endsection
