<div>
   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Posts') }}
        </h2>
    </x-slot>
    <div class="p-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
              <livewire:posts.post-create />
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                 <livewire:posts.post-view />
                 <livewire:posts.post-edit />
                 <livewire:posts.post-delete />
                <livewire:posts.post-table />
            </div>
        </div>
    </div>
</div>
