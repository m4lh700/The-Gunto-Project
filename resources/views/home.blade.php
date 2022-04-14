@extends('layouts.master')

@section('body')
<x-head height="calc(100vh / 3 * 2)" img="https://wallpaperaccess.com/full/14399.jpg" title="The Gunto Project" text="Maecenas pellentesque aliquet tincidunt. Vestibulum eget consectetur erat. Nullam eros lacus, imperdiet tristique molestie ut, laoreet sit amet enim. Phasellus eget lorem placerat, dictum metus pulvinar, aliquet augue. Duis commodo, lectus vel congue efficitur, lectus dolor vehicula nibh, sit amet fermentum." searchbar=true />

<div class="min-h-screen container mx-auto">

  <div class="mt-4 md:mt-[-80px] grid grid-cols-1 md:grid-cols-3 gap-4 h-96 md:h-40 p-4">
    <a class="bg-teal-500 rounded bg-cover bg-no-repeat shadow-lg" style="background-image: url(https://s3.voyapon.com/wp-content/uploads/2019/10/26105552/DSCF9929_reduced-1024x683.jpg);" href="{{ route('indexsmiths') }}">
      <div class="flex items-center justify-center h-full w-full bg-teal-500 bg-opacity-80 text-white transition ease-in-out duration-100 hover:bg-opacity-0 text-2xl font-bold uppercase underline rounded">
        <h2>Smiths</h2>
      </div>
    </a>

    <a class="bg-teal-500 rounded bg-cover bg-no-repeat shadow-lg" style="background-image: url(https://cdn-japantimes.com/wp-content/uploads/2013/10/nn20131026cca-870x489.jpg);" href="/research">
      <div class="flex items-center justify-center h-full w-full bg-teal-500 bg-opacity-80 text-white transition ease-in-out duration-100 hover:bg-opacity-0 text-2xl font-bold uppercase underline rounded">
        <h2>Research</h2>
      </div>
    </a>

    <a class="bg-teal-500 rounded bg-cover bg-no-repeat shadow-lg" style="background-image: url(https://new.uniquejapan.com/wp-content/uploads/2012/01/gunto-1-Edit-full-koshirae.jpg);" href="/marketplace">
      <div class="flex items-center justify-center h-full w-full bg-teal-500 bg-opacity-80 text-white transition ease-in-out duration-100 hover:bg-opacity-0 text-2xl font-bold uppercase underline rounded">
        <h2>Marketplace</h2>
      </div>
    </a>



  </div>

</div>
@endsection
