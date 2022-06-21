<?php

namespace App\Http\Livewire\Project\Show;

use Livewire\Component;

class SideDetails extends Component
{
    public $files;

    public function updatedFiles($files){
        // files uploaded.. notify.. save..
    }

    public function render()
    {
        return view('livewire.project.show.side-details');
    }
}
