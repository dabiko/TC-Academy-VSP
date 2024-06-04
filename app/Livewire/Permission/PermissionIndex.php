<?php

namespace App\Livewire\Permission;

use Illuminate\View\View;
use Livewire\Attributes\Title;
use Livewire\Component;

class PermissionIndex extends Component
{
    #[Title('Permissions')]
    public function render(): View
    {
        return view('livewire.permission.permission-index');
    }
}
