<h2 class="text-black dark:text-white text-center md:text-left text-2xl font-semibold uppercase md:text-3xl mb-4">About</h2>

@if($data->description)
  {!! $data->description !!}
@else
  Sumimasen (すみません)! <br><br> No information known about this smith! Do you have any data or information about this smith and his work? Consider submitting your information.
@endif

