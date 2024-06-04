<div>
    <x-dialog-modal wire:model.live="ViewVoteModal" submit="save">
        <x-slot name="title" class="text-justify">
               CANDIDATE DETAILS
        </x-slot>

        <x-slot name="content">
 <div class="grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <x-label for="form.name" value="{{ __('Candidate Name') }}" />
                    <x-input disabled id="form.name" wire:model="form.name" type="text" class="mt-1 block w-full"  autocomplete="form.name" />
                    <x-input-error for="form.name" class="mt-2" />
                </div>
            </div>

            <div class="mt-2 col-span-12">
                    <x-label for="form.email" value="{{ __('Email') }}" />
                    <x-input disabled id="form.email" wire:model="form.email" type="text" class="mt-1 block w-full"  autocomplete="form.email" />
                    <x-input-error for="form.email" class="mt-2" />
                </div>

            <div class="mt-2 col-span-12">
                    <x-label for="form.post" value="{{ __('Campaign Post') }}" />
                         <select disabled id="form.post" wire:model="form.post" class="mt-1 block w-full  text-black-900 focus:ring-indigo-500 rounded-md shadow-sm" autocomplete="form.post">
                            @foreach($posts as $post)
                                <option selected value="{{ $post->id }}"> {{ $post->name }}</option>
                            @endforeach
                        </select>
                    <x-input-error for="form.post" class="mt-2" />
                </div>

            <div class="mt-2 grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <x-label for="form.profession" value="{{ __('Profession') }}" />
                    <x-input disabled id="form.profession" wire:model="form.profession" type="text" class="mt-1 block w-full"  autocomplete="form.profession" />
                    <x-input-error for="form.profession" class="mt-2" />
                </div>
            </div>

            <div class="mt-2 grid grid-cols-12 gap-4">
                <div class="col-span-12">
                    <x-label for="form.quotation" value="{{ __('Quotation') }}" />
                    <textarea disabled class="mt-1 block w-full border-gray-300 focus:border-indigo-500 focus:ring-indigo-500 rounded-md shadow-sm" id="form.quotation" wire:model="form.quotation" type="text-area"  autocomplete="form.quotation"></textarea>
                    <x-input-error for="form.quotation" class="mt-2" />
                </div>
            </div>

        </x-slot>

        <x-slot name="footer">
            <x-secondary-button @click="$wire.set('ViewVoteModal', false)" wire:loading.attr="disabled">
                <i class="fa-solid fa-circle-xmark fa-xl"></i> &ensp;
                {{ __('Close') }}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>

</div>
