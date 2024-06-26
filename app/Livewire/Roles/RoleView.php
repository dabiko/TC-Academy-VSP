<?php

namespace App\Livewire\Roles;

use App\Livewire\Forms\RoleForm;
use Illuminate\View\View;
use Livewire\Attributes\On;
use Livewire\Component;
use Spatie\Permission\Models\Role;

class RoleView extends Component
{

     public RoleForm $form;

    public bool $ViewRoleModal = false;

    public string $user_id = '';

    #[On('dispatch-view-role')]
    public function setRoleEdit(Role $id): void
    {
        //dd($id);
        $this->form->setRole($id);

        $this->ViewRoleModal = true;

    }

    public function render(): View
    {
        return view('livewire.roles.role-view');
    }
}
