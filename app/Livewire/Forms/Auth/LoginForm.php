<?php

namespace App\Livewire\Forms\Auth;

use Illuminate\Support\Facades\Auth;
use Livewire\Attributes\Validate;
use Livewire\Form;

class LoginForm extends Form
{
    #[Validate(['required', 'email', 'min:10'])]
    public string $email = '';

    #[Validate(['required', 'min:3'])]
    public string $password = '';


    /**
     * Attempt to log in the user with the given credentials
     * @return bool
     */
    public function attemptLogin(): bool
    {
        $credentials = [
            'password' => $this->password,
            'email' => $this->email,
        ];

        if (!Auth::attempt($credentials)) {
            session()->flash('error', 'Login Failed!. Username or password wrong.');
            return false;
        }

        session()->regenerate();
        return true;
    }

}
