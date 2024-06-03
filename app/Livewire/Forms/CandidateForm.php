<?php

namespace App\Livewire\Forms;

use App\Models\Candidate;
use Livewire\Attributes\Rule;
use Livewire\Attributes\Validate;
use Livewire\Form;

/**
 * @method static findOrFail(string $id)
 */
class CandidateForm extends Form
{
    public ?Candidate $candidate;


    #[Rule('required', message: ' Name is required')]
    #[Rule('string', message: 'Invalid name')]
    #[Rule('min:4', message: 'Name  can not be less than 4 characters')]
    #[Rule('max:20', message: 'Name can not be more than 20 characters')]
    public string $name;

    #[Rule('required', message: ' Email is required')]
    #[Rule('string', message: 'Invalid email')]
    #[Rule('email', message: 'Invalid email format')]
    #[Rule('min:4', message: 'Email  can not be less than 4 characters')]
    #[Rule('max:30', message: 'Email can not be more than 30 characters')]
    #[Rule('unique:'.Candidate::class.',email', message: ' A candidate with :input exist already')]
    public string $email;

    #[Rule('required', message: ' Campaign post is required')]
    #[Rule('string', message: 'Invalid Campaign post')]
    public string $post;

    #[Rule('required', message: ' Profession is required')]
    #[Rule('string', message: 'Invalid name')]
    #[Rule('min:4', message: 'Profession  can not be less than 4 characters')]
    #[Rule('max:20', message: 'Profession can not be more than 20 characters')]
    public string $profession;

    #[Rule('required', message: ' Quotation is required')]
    #[Rule('string', message: 'Invalid Quotation')]
    #[Rule('min:20', message: 'Quotation  can not be less than 4 characters')]
    #[Rule('max:200', message: 'Quotation can not be more than 30 characters')]
    public string $quotation;



    public function setCandidate(Candidate $candidate): void
    {
        $this->candidate = $candidate;

        $this->name = $candidate->name;
        $this->email = $candidate->email;
        $this->post = $candidate->post_id;
        $this->profession = $candidate->profession;
        $this->quotation = $candidate->quotation;
    }


    public function store(): void
    {
        Candidate::create([
            'name' => str($this->name)->squish(),
            'email' => $this->email,
            'post_id' => $this->post,
            'profession' => $this->profession,
            'quotation' => $this->quotation,
        ]);

        $this->reset(
            $this->name = ' ',
            $this->email = ' ',
            $this->post = ' ',
            $this->profession = ' ',
            $this->quotation = ' ',
        );
    }


    public function update(): void
    {
        $this->candidate->update([
            'name' => str($this->name)->squish(),
            'email' => $this->email,
            'post_id' => $this->post,
            'profession' => $this->profession,
            'quotation' => $this->quotation,
        ]);
    }
}
