<?php

namespace Modules\Auth\Livewire;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Modules\Master\Models\User;

class SignIn extends Component
{
    #[Validate('required', message: 'Email is required.')]
    public string $email = '';
    #[Validate('required', message: 'Password is required.')]
    public string $password = '';

    public function render()
    {
        return view('auth::livewire.sign-in');
    }

    public function login() {
        $this->validate();

        $user = User::where('email', $this->email)->first();

        if (!$user) {
            $this->dispatch('login-failed');
            return;
        }

        if (!password_verify($this->password, $user->password)) {
            $this->dispatch('login-failed');
            return;
        }

        Auth::login($user);
        $this->redirect(route('master.department.index'));
    }
}
