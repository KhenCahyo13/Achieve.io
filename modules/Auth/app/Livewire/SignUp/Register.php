<?php

namespace Modules\Auth\Livewire\SignUp;

use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\Mail;
use Livewire\Component;
use Modules\Auth\Emails\SignUpMail;
use Modules\Master\Models\User;

class Register extends Component
{
    public Form $form;

    public function render()
    {
        return view('auth::livewire.sign-up.register');
    }

    public function save()
    {
        $this->validate();

        try {
            $createdUser = User::updateOrCreate([
                'email' => $this->form->email,
            ],[
                'name' => $this->form->fullname,
                'email' => $this->form->email,
                'password' => bcrypt($this->form->password),
            ]);

            $mailData = [
                'fullname' => $this->form->fullname,
                'email' => $this->form->email,
                'link' => config('app.url') . '/auth/signup/verify/' . $createdUser->id,
            ];
            Mail::to($this->form->email)
                ->send(new SignUpMail($mailData));

            $this->form->reset();
            $this->dispatch('registration-success');
        } catch (\Exception $e) {
            Log::error('Registration error: ' . $e->getMessage());
        }
    }
}
