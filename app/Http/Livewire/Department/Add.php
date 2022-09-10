<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Add extends Component
{
    use LivewireAlert;
    public $name;
    public function add()
    {
        $this->validate([
            'name' => 'required',
        ]);
        Department::create([
            'name' => $this->name,
        ]);
        $this->emitTo('project.all', '$refresh');
        $this->reset();
        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }
    public function render()
    {
        return view('livewire.department.add');
    }
}
