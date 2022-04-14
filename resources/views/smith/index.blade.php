@extends('layouts.master')

@section('body')
<x-head height="calc(100vh / 3 * 2)" img="https://wallpaperaccess.com/full/14399.jpg" title="Smiths Database" text="" searchbar=true />

<div class="min-h-screen container mx-auto mt-4 p-4 md:p-0">
  {{ $data->links() }}
  <div class="mt-20 grid grid-cols-1 md:grid-cols-4 gap-4 mb-8">
    @foreach($data as $smith)
      <x-smithcard :smith=$smith />
    @endforeach
  </div>
  {{ $data->links() }}
</div>
@endsection
