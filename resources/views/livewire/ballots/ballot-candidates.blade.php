@php
    use App\Models\Candidate;
    use App\Models\Votes;
    use Illuminate\Support\Facades\Auth;
@endphp
<div>
    @if(count($posts) > 0 && count($candidates) > 0)

        @foreach($posts as $post)
            <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
                <h1 class="mt-8 font-semibold text-2xl text-center text-gray-900">
                    @php
                        $count_candidates = Candidate::where('post_id', $post->id)->count();
                    @endphp
                    Candidates: {{$post->name}} ({{$count_candidates}})
                </h1>
            </div>

            <div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">

                @php
                $candidates = Candidate::where('post_id', $post->id)->get();
                @endphp
                @foreach($candidates as $key => $candidate)
                    <div>
                            <div class=" flex items-center">
                                <div class="bg-white rounded-sm shadow-md p-6 my-6 text-center">
                                    <img class="w-20 rounded-full mb-4"
                                         src="https://spacema-dev.com/elevate/assets/images/team/1.jpg"
                                         alt="Number one"
                                    >

                                    <p class="mt-4 text-gray-500 text-sm leading-relaxed">{{$candidate->quotation}}</p>

                                    <h3 class="ms-3 text-xl font-semibold mb-2">Name: {{$candidate->name}}</h3>
                                    <h3 class="ms-3 text-xl font-semibold mb-2">
                                        Profession: {{$candidate->profession}} </h3>
                                    <div class="mb-4">
                                        <button
                                            @click="$dispatch('dispatch-vote-now',
                                            { candidate_id: '{{ Crypt::encryptString($candidate->id) }}',
                                             name: '{{$candidate->name}}',
                                             post_id: '{{ Crypt::encryptString($post->id) }}',
                                             post: '{{$post->name}}',
                                             })"
                                            class="mt-4 px-3 py-1 bg-indigo-600 dark:bg-indigo-700 text-white rounded">
                                            <i class='fa-regular fa-circle-dot fa-beat-fade'></i>
                                            Vote Now
                                        </button>
                                    </div>
                                </div>
                            </div>
                        </div>
                @endforeach
            </div>
        @endforeach
    @else
        <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
            <h1 class="mt-8 font-semibold text-2xl text-center text-gray-900">
                No Campaign is currently running
            </h1>
        </div>
    @endif
</div>
