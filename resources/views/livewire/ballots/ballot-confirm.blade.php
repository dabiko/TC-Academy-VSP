<div>
    <x-dialog-modal wire:model.live="ConfirmBallotModal" submit="edit">
        <x-slot name="title" class="text-justify">
            Vote {{ $name }}
        </x-slot>

        <x-slot name="content">
            <p class="ms-3 text-xl font-semibold mb-2">
                Are you sure you want to vote {{ $name }} ?
                Once you cast your vote, you can't reverse it action
            </p>
        </x-slot>

        <x-slot name="footer">
            <x-danger-button class="ml-3 hover:bg-red-700 bg-red-500" @click="$wire.set('ConfirmBallotModal', false)" wire:loading.attr="disabled">
                <i class="fa-solid fa-circle-xmark fa-xl"></i> &ensp;
                {{ __('Cancel') }}
            </x-danger-button>

            <x-secondary-button wire:click="voteCandidate" class="ml-3 hover:bg-indigo-700 bg-indigo-600" wire:loading.attr="disabled">
                <i class="fa-regular fa-circle-dot fa-beat-fade"></i> &ensp;
                {{ __('Vote') }}
            </x-secondary-button>
        </x-slot>
    </x-dialog-modal>

</div>
