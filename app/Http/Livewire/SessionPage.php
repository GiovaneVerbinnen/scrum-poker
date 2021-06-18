<?php

namespace App\Http\Livewire;

use Livewire\Component;

class SessionPage extends Component
{
    public function render()
    {
        return view('livewire.session-page')->layout('layouts.dark');
    }
}
