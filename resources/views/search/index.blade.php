@extends('layouts.master')

@section('body')
  <x-head height="calc(100vh / 3 * 1)" img="https://wallpaperaccess.com/full/14399.jpg" title="Search:" text="" />

<div class="min-h-screen container mx-auto">
  @if($data)
    {{$data}}
  @else
    <p>Nothing found!</p>
  @endif
</div>
@endsection
