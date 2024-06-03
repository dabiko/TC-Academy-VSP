<?php

namespace App\Livewire\Roles;

use Illuminate\View\View;
use Livewire\Component;
use App\Livewire\Forms\RoleForm;
use Illuminate\Database\QueryException;

class RoleCreate extends Component
{
     public RoleForm $form;

    public bool $CreateRoleModal = false;

    public function save(): void
    {
        $this->validate();

         foreach ($this->validate() as $key => $value) {
             try{

                $branch = $this->form->store();

                is_null($branch)
                    ? $this->dispatch('notify', title: 'success', message:  ' '.$value. ' created successfully')
                    : $this->dispatch('notify', title: 'fail', message: 'Ops!! Something went wrong');

                $this->dispatch('dispatch-role-created')->to(RoleTable::class);

            }catch (QueryException $e){

                $errorCode = $e->errorInfo[1];

                ($errorCode == 1062 || $errorCode == 500)
                    ? $this->dispatch('notify', title: 'fail', message: 'We have a duplicate entry problem')
                    : $this->dispatch('notify', title: 'fail', message: 'Something strange happened ');
            }
         }

    }

    public function render(): View
    {
        return view('livewire.roles.role-create');
    }
}
