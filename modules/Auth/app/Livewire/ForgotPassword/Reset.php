<?php

namespace Modules\Auth\Livewire\ForgotPassword;

use Livewire\Attributes\Validate;
use Livewire\Component;
use Modules\Master\Models\User;

class Reset extends Component
{
    #[Validate('required', message: 'New password is required.')]
    #[Validate('min:8', message: 'New password must be at least 8 characters long.')]
    public string $newPassword = '';

    #[Validate('required', message: 'Confirm password is required.')]
    #[Validate('same:newPassword', message: 'Confirm password must match the new password.')]
    public string $confirmPassword = '';

    public string $id = '';

    public function mount(string $id) {
        $this->id = $id;
    }

    public function render()
    {
        return view('auth::livewire.forgot-password.reset');
    }

    public function resetPassword() {
        $this->validate();

        $user = User::find($this->id);

        $user->update([
            'password' => bcrypt($this->newPassword),
        ]);

        return redirect(route('auth.signin.index'))
            ->with('success', 'Password reset successfully. You can now log in with your new password.');
    }
}
