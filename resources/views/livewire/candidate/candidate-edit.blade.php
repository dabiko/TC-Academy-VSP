<div>
    <x-dialog-modal wire:model.live="UpdateCandidateModal" submit="save">
        <x-slot name="title" class="text-justify">
            UPDATE CANDIDATE
        </x-slot>

        <x-slot name="content">
            <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <x-label for="form.name" value="{{ __('Candidate Name') }}" />
                    <x-input id="form.name" wire:model="form.name" type="text" class="mt-1 block w-full"  autocomplete="form.name" />
                    <x-input-error for="form.name" class="mt-2" />
                </div>
            </div>

            <div class="mt-2 col-span-12">
                    <x-label for="form.email" value="{{ __('Email') }}" />
                    <x-input id="form.email" wire:model="form.email" type="text" class="mt-1 block w-full"  autocomplete="form.email" />
                    <x-input-error for="form.email" class="mt-2" />
                </div>

            <div class="mt-2 col-span-12">
                    <x-label for="form.post" value="{{ __('Campaign Post') }}" />
                    <select id="form.post" wire:model="form.post" class="mt-1 block w-full  text-black-300 focus:ring-indigo-500 rounded-md shadow-sm" autocomplete="form.post">
                        <option selected value="form.post">Select Campaign Post</option>
                        @foreach($posts as $post)
                            <option selected value="{{ $post->id }}"> {{ $post->name }}</option>
                        @endforeach
                    </select>
                    <x-input-error for="form.post" class="mt-2" />
                </div>

            <div class="mt-2 grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <x-label for="form.profession" value="{{ __('Profession') }}" />
                    <x-input id="form.profession" wire:model="form.profession" type="text" class="mt-1 block w-full"  autocomplete="form.profession" />
                    <x-input-error for="form.profession" class="mt-2" />
                </div>
            </div>

            <div class="mt-2 grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <x-label for="form.quotation" value="{{ __('Quotation') }}" />
                    <textarea class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="form.quotation" wire:model="form.quotation" type="text-area"  autocomplete="form.quotation"></textarea>
                    <x-input-error for="form.quotation" class="mt-2" />
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('UpdateCandidateModal', false)" wire:loading.attr="disabled">
                <i class="fa-solid fa-circle-xmark fa-xl"></i> &ensp;
                {{ __('Cancel') }}
            </x-secondary-button>

            <x-button class="ml-3 hover:bg-indigo-700 bg-indigo-500" wire:loading.attr="disabled">
                <i class="fa-solid fa-hard-drive fa-xl"></i>&ensp;
                {{ __('Save') }}
            </x-button>
        </x-slot>
    </x-dialog-modal>

</div>
