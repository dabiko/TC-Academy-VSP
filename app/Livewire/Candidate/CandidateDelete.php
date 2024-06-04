<?php

namespace App\Livewire\Candidate;

use App\Models\Candidate;
use App\Traits\EncryptDecrypt;
use Illuminate\View\View;
use Livewire\Attributes\Locked;
use Livewire\Attributes\On;
use Livewire\Component;

class CandidateDelete extends Component
{

    use EncryptDecrypt;

    #[Locked]
    public string $id;

    #[Locked]
    public string $name;

    public bool $DeleteCandidateModal = false;

    #[On('dispatch-delete-candidate')]
    public function set_candidate($id, $name): void
    {
        $this->id = $id;
        $this->name = $name;

        $this->DeleteCandidateModal  = true;
    }

    public function deleteCandidate(): void
    {
        $delete = Candidate::where('id',$this->decryptId($this->id))->delete();

        ($delete)
            ? $this->dispatch('notify', title: 'success', message:  ' '.$this->name. ' Deleted successfully')
            : $this->dispatch('notify', title: 'fail', message: 'Ops!! Something went wrong');

        $this->dispatch('dispatch-candidate-deleted')->to(CandidateTable::class);

        $this->DeleteCandidateModal  = false;

    }

    public function render(): View
    {
        return view('livewire.candidate.candidate-delete');
    }
}
