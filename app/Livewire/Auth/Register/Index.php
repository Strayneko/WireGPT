<?php

namespace App\Livewire\Auth\Register;

use Livewire\Attributes\Title;
use Livewire\Component;

class Index extends Component
{
    #[Title('Register')]
    public function render()
    {
        return view('livewire.auth.register.index');
    }
}
