<?php

namespace App\Livewire\Roles;

use Livewire\Attributes\Title;
use Livewire\Component;

#[Title('Roles')]
class RoleIndex extends Component
{
    public function render()
    {
        return view('livewire.roles.role-index');
    }
}
