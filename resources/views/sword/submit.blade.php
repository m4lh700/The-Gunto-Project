@extends('layouts.master')

@section('body')
<x-head height="calc(100vh / 3 * 1)" img="https://wallpaperaccess.com/full/14399.jpg" title="Submit sword" text="" />

<div class="min-h-screen container mx-auto mt-4 p-4 md:p-0">
  <form name="submitswordtest" method="post" action="/swords/submit/submitsword">
    @csrf
      <div class="form-group">
        <label for="smith_id">Smith (if unknown leave empty, if filled in leave it)</label>
        <input type="text" id="smith_id" name="smith_id" class="@if($data) cursor-not-allowed @endif h-10 border mt-1 rounded px-4 w-full bg-gray-50" value="@if($data){{$data->slug}} @elseif(old('smith_id')){{ old('smith_id') }} @endif" @if($data) disabled @endif>
      </div>
      <div class="form-group">
        <label for="description">Description</label>
        <textarea name="description" class="h-10 border mt-1 rounded px-4 w-full bg-gray-50">{{ old('description') }}</textarea>
      </div>
      <div class="form-group">
        <label for="sword_type">Sword type</label>
          <select name="sword_type" selected="{{ old('sword_type') }}">
            <option value="0" @if( old('sword_type') == 0 ) selected @endif >Unknown</option>
            <option value="1" @if( old('sword_type') == 1 ) selected @endif>Gendaito</option>
            <option value="2" @if( old('sword_type') == 2 ) selected @endif>Showato</option>
            <option value="3" @if( old('sword_type') == 3 ) selected @endif>Ersatz</option>
          </select>
      </div>
      @if($data)
        <input type="hidden" name="slug" value="{{ $data->slug }}">
      @endif
      <button type="submit" class="flex-shrink-0 bg-teal-500 hover:bg-teal-700 border-teal-500 hover:border-teal-700 text-sm border-4 text-white py-3 px-4 rounded w-full md:w-auto">Submit</button>
  </form>
</div>
@endsection
