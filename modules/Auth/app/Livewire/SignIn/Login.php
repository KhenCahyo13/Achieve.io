<?php

namespace Modules\Auth\Livewire\SignIn;

use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Modules\Master\Models\User;

class Login extends Component
{
    public Form $form;

    public string $errorMessage = '';

    public function render()
    {
        return view('auth::livewire.sign-in.login');
    }

    public function login()
    {
        $this->validate();

        $user = User::where('email', $this->form->email)->first();

        if (! $user) {
            $this->dispatch('login-failed');
            $this->errorMessage = 'Username or password is incorrect.';

            return;
        }

        if ($user->email_verified_at === null) {
            $this->dispatch('login-failed');
            $this->errorMessage = 'Your email is not verified yet. Please check your inbox for the verification email.';

            return;
        }

        if (! password_verify($this->form->password, $user->password)) {
            $this->dispatch('login-failed');
            $this->errorMessage = 'Username or password is incorrect.';

            return;
        }

        Auth::login($user);
        $this->redirect(route('core.dashboard'));
    }
}
