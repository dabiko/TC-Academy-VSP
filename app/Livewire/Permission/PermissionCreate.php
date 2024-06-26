<?php

namespace App\Livewire\Permission;

use App\Livewire\Forms\PermissionForm;
use Illuminate\Database\QueryException;
use Illuminate\View\View;
use Livewire\Component;

class PermissionCreate extends Component
{

    public PermissionForm $form;

    public bool $CreatePermissionModal = false;

    public function save(): void
    {
        $this->validate();

        try{

            $branch = $this->form->store();

            is_null($branch)
                ? $this->dispatch('notify', title: 'success', message:  ' '.$this->form->name. ' Created successfully')
                : $this->dispatch('notify', title: 'fail', message: 'Ops!! Something went wrong');

            $this->dispatch('dispatch-permission-created')->to(PermissionTable::class);


        }catch (QueryException $e){

            $errorCode = $e->errorInfo[1];

            ($errorCode == 1062)
                ? $this->dispatch('notify', title: 'fail', message: 'we have a duplicate entry problem')
                : $this->dispatch('notify', title: 'fail', message: 'Something strange happened ');
        }
    }

    public function render(): View
    {
        return view('livewire.permission.permission-create');
    }
}
