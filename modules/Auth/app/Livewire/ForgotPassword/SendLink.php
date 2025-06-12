<?php

namespace Modules\Auth\Livewire\ForgotPassword;

use Exception;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Attributes\Validate;
use Livewire\Component;
use Modules\Auth\Emails\ResetPasswordMail;
use Modules\Master\Models\User;

class SendLink extends Component
{
    #[Validate('email', message: 'Email must be a valid email address.')]
    #[Validate('required', message: 'Email field is required.')]
    public string $email = '';
    
    public function render()
    {
        return view('auth::livewire.forgot-password.send-link');
    }

    public function sendLink() {
        $this->validate();

        try {
            $user = User::where('email', $this->email)->first();

            if (!$user) {
                $this->dispatch('forgot-password-error', message: 'Email not found.');
                return;
            }

            if ($user->email_verified_at === null) {
                $this->dispatch('forgot-password-error', message: 'Email not verified.');
                return;
            }

            $mailData = [
                'fullname' => $user->fullname,
                'email' => $user->email,
                'link' => config('app.url') . '/auth/forgot-password/' . $user->id . '/reset-password',
            ];
            Mail::to($user->email)
                ->send(new ResetPasswordMail($mailData));

            $this->dispatch('forgot-password-success', message: 'Reset link sent successfully.');
            $this->email = '';
        } catch (Exception $e) {
            Log::error('Forgot password error: ' . $e->getMessage());
        }
    }
}
