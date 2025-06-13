<?php

namespace Modules\Auth\Livewire\Verification;

use Livewire\Component;
use Modules\Master\Models\User;

class EmailVerification extends Component
{
    public string $id = '';

    public function mount(string $id)
    {
        $this->id = $id;
    }

    public function render()
    {
        return view('auth::livewire.verification.email-verification');
    }

    public function verify()
    {
        $user = User::find($this->id);

        $user->update([
            'email_verified_at' => now(),
        ]);

        session()->flash('success', 'Your email has been verified successfully! You can now login.');

        return $this->redirect(route('auth.signin.index'));
    }
}
