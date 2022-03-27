@extends('layouts.master')

@section('body')
  <x-head height="calc(100vh / 3 * 1)" img="https://wallpaperaccess.com/full/14399.jpg" title="Smiths" text="" />

<div class="h-screen container mx-auto mt-4">
<div class="mt-20 grid grid-cols-4 gap-4 h-40">
  @foreach($data as $smith)
    <x-smithcard :smith=$smith />
  @endforeach

</div>

</div>
@endsection
