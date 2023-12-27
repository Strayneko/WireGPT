<?php

namespace App\Livewire\Auth\Login;

use App\Livewire\Forms\Auth\LoginForm;
use Livewire\Component;

class Login extends Component
{
    public LoginForm $form;

    public bool $isInputPassword = false;


    /**
     * Handle form submit
     * @return void
     */
    public function submit(): void
    {
        if ($this->verifyEmail()) return;

        $this->validate();

        if (!$this->form->attemptLogin()) return;

        $this->redirect(route('index'), navigate: true);
    }

    public function goToRegister(): void
    {
        $this->redirect(route('auth.register'), true);
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
        return view('livewire.auth.login.login');
    }
}
