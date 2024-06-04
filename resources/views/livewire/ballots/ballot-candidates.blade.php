<div>
   @if(count($posts) > 0 && count($candidates) > 0)
       @foreach($posts as $post)
           @foreach($candidates as $candidate)
               @if($post->id == $candidate->post_id && $post->name == "President")
                   <p>Yes Yes !!</p>
               @endif
           @endforeach
       @endforeach
   @else
       <div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-8 font-semibold text-2xl text-center text-gray-900">
        No Campaign is currently running
    </h1>
</div>
   @endif
<div class="p-6 lg:p-8 bg-white border-b border-gray-200">
    <h1 class="mt-8 font-semibold text-2xl text-center text-gray-900">
        Candidates: President
    </h1>
</div>

<div class="bg-gray-200 bg-opacity-25 grid grid-cols-1 md:grid-cols-2 gap-6 lg:gap-8 p-6 lg:p-8">
    <div>
        <div class=" flex items-center">
            <div class="bg-white rounded-sm shadow-md p-6 my-6 text-center">
                <img  class="w-auto rounded-full mb-4"
                      src="https://spacema-dev.com/elevate/assets/images/team/1.jpg"
                      alt="Number one"
                >

        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
          The vote is the most powerful instrument ever devised by man for breaking down injustice and destroying the terrible walls which imprison men because they are different from other men.
        </p>

                <h3 class="ms-3 text-xl font-semibold mb-2">Licolar Zehcrov</h3>
                <p class="text-gray-700">Profession: Politician</p>
                <div class="mb-4">
                    <button @click="$dispatch('dispatch-delete-role', { id: '', name: '' })" class="px-3 py-1 bg-indigo-600 dark:bg-indigo-700 text-white rounded">
                       <i class='fa-regular fa-circle-dot fa-beat-fade'></i>
                        Vote Now
                    </button>
                </div>
            </div>
        </div>
    </div>

    <div>
        <div class="flex items-center">
            <div class="bg-white rounded-sm shadow-md p-6 my-6 text-center">
                <img  class="w-auto rounded-full mb-4"
                      src="https://spacema-dev.com/elevate/assets/images/team/6.jpg"
                      alt="Number one"
                >
                <p class="mt-4 text-gray-500 text-sm leading-relaxed">
          The vote is the most powerful instrument ever devised by man for breaking down injustice and destroying the terrible walls which imprison men because they are different from other men.
        </p>
                <h3 class="ms-3 text-xl font-semibold mb-2">Licolar Zehcrov</h3>
                <p class="text-gray-700">Profession: Politician</p>
                <div class="mb-4">
                    <button @click="$dispatch('dispatch-delete-role', { id: '', name: '' })" class="px-3 py-1 bg-indigo-600 dark:bg-indigo-700 text-white rounded">
                       <i class='fa-regular fa-circle-dot fa-beat-fade'></i>
                        Vote Now
                    </button>
                </div>
            </div>
        </div>
    </div>

   <div>
        <div class="flex items-center">
            <div class="bg-white rounded-sm shadow-md p-6 my-6 text-center">
                <img  class="w-auto rounded-full mb-4"
                      src="https://spacema-dev.com/elevate/assets/images/team/2.jpg"
                      alt="Number one"
                >

        <p class="mt-4 text-gray-500 text-sm leading-relaxed">
          The vote is the most powerful instrument ever devised by man for breaking down injustice and destroying the terrible walls which imprison men because they are different from other men.
        </p>
                <h3 class="ms-3 text-xl font-semibold mb-2">Licolar Zehcrov</h3>
                <p class="text-gray-700">Profession: Politician</p>
                <div class="mb-4">
                    <button @click="$dispatch('dispatch-delete-role', { id: '', name: '' })" class="px-3 py-1 bg-indigo-600 dark:bg-indigo-700 text-white rounded">
                       <i class='fa-regular fa-circle-dot fa-beat-fade'></i>
                        Vote Now
                    </button>
                </div>
            </div>
        </div>

    </div>

    <div>
        <div class="flex items-center">
            <div class="bg-white rounded-sm shadow-md p-6 my-6 text-center">
                <img  class="w-auto rounded-full mb-4"
                      src="https://spacema-dev.com/elevate/assets/images/team/7.jpg"
                      alt="Number one"
                >
                 <p class="mt-4 text-gray-500 text-sm leading-relaxed">
          The vote is the most powerful instrument ever devised by man for breaking down injustice and destroying the terrible walls which imprison men because they are different from other men.
        </p>
                <h3 class="ms-3 text-xl font-semibold mb-2">Licolar Zehcrov</h3>
                <p class="text-gray-700">Profession: Politician</p>
                <div class="mb-4">
                    <button @click="$dispatch('dispatch-delete-role', { id: '', name: '' })" class="px-3 py-1 bg-indigo-600 dark:bg-indigo-700 text-white rounded">
                       <i class='fa-regular fa-circle-dot fa-beat-fade'></i>
                        Vote Now
                    </button>
                </div>
            </div>
        </div>

    </div>
</div>

</div>
