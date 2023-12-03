<?php

namespace App\Livewire\Auth\Login;

use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Title('Login')]
    public function render()
    {
        return view('livewire.auth.login.index');
    }
}
