@php
    use App\Models\Candidate;
    use App\Models\Post;
    use App\Models\Votes;


	$posts = Post::all();
    $votes = Votes::all();
	$candidates = Candidate::all();
@endphp
<div>
    <!DOCTYPE html>
    <html>
    <head>
        <title>{{ $mailData['title'] }}</title>
    </head>
    <body>
    <p>{{ $mailData['body'] }}</p>
<div class="">
  <div class="flex flex-col">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden sm:px-6 lg:px-8">
          <table
          class="min-w-full text-center text-sm font-light text-surface">
              <thead
                class="border-b border-neutral-200 font-medium dark:border-white/10">
                <tr>
				       <th scope="col" class="px-6 py-4"> #No </th>
					   <th scope="col" class="px-6 py-4"> Candidate Name </th>
					   <th scope="col" class="px-6 py-4"> Profession </th>
					   <th scope="col" class="px-6 py-4"> Post </th>
					   <th scope="col" class="px-6 py-4"> Vote Count </th>
					   <th scope="col" class="px-6 py-4"> Last Update </th>
                </tr>
              </thead>
              <tbody class="divide-y divide-gray-200">
              @foreach ($candidates as $key => $candidate)
                   <tr  class="border-b border-neutral-200 dark:border-white/10">

                       <td class="whitespace-nowrap py-4 pl-4 pr-3 text-sm font-medium text-gray-900 sm:pl-6">
                                <x-button class="px-3 py-1 hover:bg-indigo-700  bg-indigo-500 text-white rounded">
                                    {{ $candidate->id }}
                                </x-button>
                       </td>
                       <td class="whitespace-nowrap px-6 py-4">
                           {{ $candidate->name }}
                       </td>

                       <td class="whitespace-nowrap px-6 py-4">
                           {{ $candidate->profession }}
                       </td>

                       <td class="whitespace-nowrap px-6 py-4">
                           {{ $candidate->post->name }}
                       </td>

                       <td class="whitespace-nowrap px-6 py-4">
                           @php
                                $vote_count = Votes::where('candidate_id', $candidate->id)->count();
                           @endphp

                           <button class="mt-4 px-3 py-1 bg-indigo-600 dark:bg-indigo-700 text-white rounded">
                               <i class='fa-regular fa-circle-dot fa-beat-fade'>&ensp; {{ $vote_count }}</i>

                             </button>
                       </td>

                       <td class="whitespace-nowrap px-6 py-4">
                          {{ $candidate->updated_at }}
                       </td>
                   </tr>
              @endforeach
              </tbody>
           </table>
      </div>
    </div>
  </div>
</div>
</div>
    <p>Regards</p>
    </body>
    </html>
</div>
