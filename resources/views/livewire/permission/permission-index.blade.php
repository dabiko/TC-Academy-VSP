<div>
   <x-slot name="header">
        <h2 class="font-semibold text-xl text-gray-800 leading-tight">
            {{ __('Permissions') }}
        </h2>
    </x-slot>
    <div class="p-5">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8 float-right">
              <livewire:permission.permission-create />
        </div>
    </div>
    <div class="py-12">
        <div class="max-w-7xl mx-auto sm:px-6 lg:px-8">
            <div class="bg-white overflow-hidden shadow-xl sm:rounded-lg">
                <livewire:permission.permission-view />
                <livewire:permission.permission-edit/>
                <livewire:permission.permission-delete/>
                <livewire:permission.permission-table />
            </div>
        </div>
    </div>
</div>
