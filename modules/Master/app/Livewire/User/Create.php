<?php

namespace Modules\Master\Livewire\User;

use Livewire\Component;
use Modules\Master\Models\Role;
use Modules\Master\Models\User;

class Create extends Component
{
    public Form $form;

    public function render()
    {
        $roles = Role::all()->pluck('name');

        return view('master::livewire.user.create', compact('roles'));
    }

    public function save()
    {
        $this->validate();

        User::create([
            'name' => $this->form->name,
            'email' => $this->form->email,
            'password' => bcrypt($this->form->password),
        ])->assignRole($this->form->role);

        $this->form->reset();

        $this->dispatch('user-created', message: 'User created successfully!');
    }
}
