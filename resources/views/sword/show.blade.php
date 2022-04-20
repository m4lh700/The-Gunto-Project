@extends('layouts.master')

@section('body')
<x-head height="calc(100vh / 3 * 1)" img="https://wallpaperaccess.com/full/14399.jpg" title="Sword by {{ $data->smith->name }}" text="" />

<div class="min-h-screen container mx-auto flex justify-between">
    <x-smithprofile :data=$smith />

    <div class="mx-auto w-full lg:ml-20 md:flex-1 lg:mt-20 lg:p-0 p-4">
      {{ $data->sword_type }}
      {{ $data->id }}
    </div>
</div>
@endsection
