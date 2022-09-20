<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Traits\Livewire\DeleteTrait;


class Card extends Component
{
    use LivewireAlert, DeleteTrait;
    protected $listeners = ['forceDelete', '$refresh'];

    public $department;

    protected $rules = [
        'department.name' => 'required',
    ];

    public function edit_name()
    {
        $this->department->save();
        $this->alert('success', __('ui.data_has_been_edited_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }

    public function confirmed($id)
    {
        // make sure add 'delete' to listeners
        $this->confirmedDelete(new Department, $id, 'forceDelete', ['department.all']);
    }
    public function render()
    {
        return view('livewire.department.card');
    }
}
