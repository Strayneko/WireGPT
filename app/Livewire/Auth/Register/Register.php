<?php

namespace App\Livewire\Auth\Register;

use App\Livewire\Forms\Auth\RegisterForm;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;

class Register extends Component
{
    public RegisterForm $form;

    public bool $isInputPassword = false;

    public function submit(): void
    {
        if ($this->verifyEmail()) return;

        $user = $this->form->createAccount();

        if ($user['status'] === false) {
            session()->flash('error', $user['message']);
            return;
        }

        Auth::login($user['data']);

        $this->redirect(route('index'), true);
    }

    public function goToLogin(): void
    {
        $this->redirect(route('auth.login'), true);
    }

    /**
     * Verify user email to check if email exists in the database
     * @return bool
     */
    private function verifyEmail(): bool
    {
        if (!$this->isInputPassword) {
            $this->validateOnly('form.email');
            $this->isInputPassword = true;
            return true;
        }

        return false;
    }

    public function render()
    {
        return view('livewire.auth.register.register');
    }
}
