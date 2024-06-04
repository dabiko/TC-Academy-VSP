@php
    use App\Models\Candidate;
    use App\Models\Post;
    use App\Models\Votes;
    use Illuminate\Support\Facades\DB;
@endphp
<div>
    <!DOCTYPE html>
    <html>
    <head>
        <title>TCAcademy: Voting System Prototype [LARAVEL]</title>
    </head>
    <body>
    <h1>{{ $mailData['title'] }}</h1>
    <p>{{ $mailData['body'] }}</p>
    <div>
        <div class="flex flex-col">
  <div class="overflow-x-auto sm:-mx-6 lg:-mx-8">
    <div class="inline-block min-w-full py-2 sm:px-6 lg:px-8">
      <div class="overflow-hidden sm:px-6 lg:px-8">
            <table class="min-w-full text-center text-sm font-light text-surface">
               <thead class="border-b border-neutral-200 font-medium dark:border-white/10">
                <tr>
                  <th scope="col" class="px-6 py-3.5 text-left text-sm font-semibold text-gray-700">
                   Candidate Name
                  </th> &ensp; &ensp;

                  <th scope="col" class="px-6 py-3.5 text-left text-sm font-semibold text-gray-700">
                   Candidate Post
                  </th>&ensp; &ensp;

                    <th scope="col" class="px-6 py-3.5 text-left text-sm font-semibold text-gray-700">
                    Total Vote Count
                  </th>&ensp; &ensp;
                </tr>
              </thead>
    <tbody class="divide-y divide-gray-200">
        @foreach($mailData['stats']  as $key => $stat)
                @php
                    $candidateId = $stat['candidate_id'];
                    $Id = $stat['id'];

                    $stats_details = Votes::findOrFail($Id);
                    $voteCount = Votes::where('candidate_id', $candidateId)->count();
                @endphp
                   <tr>
                       <td class="whitespace-nowrap px-6 py-4">
                           {{$stats_details->candidate->name}}
                       </td>
                   </tr>

                   <tr>
                       <td class="whitespace-nowrap px-6 py-4">
                           {{$stats_details->post->name}}
                       </td>
                   </tr>

                   <tr>
                       <td class="whitespace-nowrap px-6 py-4">
                          {{ $voteCount }}
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
