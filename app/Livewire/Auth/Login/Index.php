<?php

namespace App\Livewire\Auth\Login;

use App\Livewire\Forms\Auth\LoginForm;
use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    public LoginForm $form;

    /**
     * @return void
     */
    public function authenticate(): void
    {
        $this->form->validate();
    }

    #[Title('Login')]
    public function render()
    {
        return view('livewire.auth.login.index');
    }
}
