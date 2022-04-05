<h2 class="text-black text-2xl font-semibold uppercase md:text-3xl mb-4">Swords</h2>

@if($data->swords->count() > 0)

  @foreach($data->swords as $sword)
    {{dump($sword)}}
  @endforeach

@else
  Sumimasen (すみません)! <br><br> No swords have been added yet for this smith, please consider submitting if you have a work from this smith.
@endif
