<?php

namespace Modules\Master\Livewire\Profile;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Modules\Master\Models\User;

class Security extends Component
{
    #[Validate('required', message: 'Password field is required')]
    #[Validate('min:8', message: 'Password must be at least 8 characters')]
    #[Validate('max:255', message: 'Password must be less than 255 characters')]
    public string $password = '';

    #[Validate('required', message: 'Password confirmation is required')]
    #[Validate('same:password', message: 'Password confirmation must match the password')]
    public string $passwordConfirmation = '';

    public function render()
    {
        return view('master::livewire.profile.security');
    }

    public function updatePassword()
    {
        $this->validate();

        $user = User::find(Auth::user()->id);
        $user->update([
            'password' => bcrypt($this->password),
        ]);

        $this->dispatch('password-updated', message: 'Password updated successfully.');
    }
}
