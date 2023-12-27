<?php

namespace App\Livewire\Forms\Auth;

use App\Services\AuthService;
use Livewire\Attributes\Validate;
use Livewire\Form;

class RegisterForm extends Form
{
    #[Validate(['required', 'email', 'min:10', 'unique:users'])]
    public string $email = '';

    #[Validate(['required', 'min:3'])]
    public string $password = '';

    private AuthService $authService;

    /** {@inheritDoc} */
    public function boot()
    {
        $this->authService = new AuthService();
    }

    /**
     * Create new account
     * @return array
     */
    public function createAccount(): array
    {
        $this->validate();

        $user = $this->authService->createAccount([
            'email' => $this->email,
            'password' => $this->password
        ]);

        return $user;
    }
}
