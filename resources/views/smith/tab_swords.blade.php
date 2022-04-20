<h2 class="text-black text-2xl font-semibold uppercase md:text-3xl mb-4">Swords</h2>

  <div class="mt-20 grid grid-cols-1 md:grid-cols-2 lg:grid-cols-4 gap-4 mb-8">
    <a class="bg-teal-500 rounded bg-cover bg-no-repeat shadow-lg" style="background-image: url(https://s3.voyapon.com/wp-content/uploads/2019/10/26105552/DSCF9929_reduced-1024x683.jpg);" href="{{ route('swordsubmit', ['slug' => $data->slug]) }}">
      <div class="flex items-center justify-center text-center h-full w-full bg-teal-500 bg-opacity-80 text-white transition ease-in-out duration-100 hover:bg-opacity-0 text-2xl font-bold uppercase underline rounded">
        <p class="text-center">&#43;</p>
        <br>
        <p class="text-center">Submit sword</p>
      </div>
    </a>
    @if($data->swords->count() > 0)
    @foreach($data->swords as $sword)
      <livewire:smith-related-sword :sword=$sword />
    @endforeach


@else
  Sumimasen (すみません)! <br><br> No swords have been added yet for this smith, please consider submitting if you have a work from this smith.
@endif

</div>
