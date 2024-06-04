<div>
    <!DOCTYPE html>
    <html>
    <head>
        <title>TCAcademy: Voting System Prototype [LARAVEL]</title>
    </head>
    <body>
        <h1>>{{ $mailData['title'] }}</h1>
         <p>{{ $mailData['body'] }}</p>
{{--            @foreach($stats as $stat)--}}
{{--                <div>--}}
{{--                  <p> Candidate name: {{$stat->condidate->name}}</p>--}}
{{--                   <p> Candidate Post: {{$stat->post->name}}</p>--}}
{{--                    @php--}}
{{--                    $candidate_vote_count = \App\Models\Votes::withCount('vote_count')->find($stat->condidate_id)->count();--}}
{{--                    @endphp--}}
{{--                   <p> Vote Count: {{ $candidate_vote_count }}</p>--}}
{{--                </div>--}}
{{--            @endforeach--}}
        <p>Regards</p>
    </body>
    </html>
</div>
