<?php

namespace App\Livewire\Forms;

use App\Models\Candidate;
use Livewire\Attributes\Validate;
use Livewire\Form;

class CandidateForm extends Form
{
    public ?Candidate $candidate;
}
