<?php

namespace App\Livewire;

use Livewire\Component;

class TopbarMenu extends Component
{
    public $open = false;

    public function toggleMenu()
    {
        $this->open = ! $this->open;
    }


    public function render()
    {
        return view('livewire.topbar-menu');
    }
}
