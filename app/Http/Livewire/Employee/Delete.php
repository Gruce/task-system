<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Delete extends Component
{
    use LivewireAlert;
    protected $listeners = ['$refresh', 'deleteCheckedEmployee'];
    public $selectAll = false;
    public $selected = [];

    public function mount()
    {
        $this->employees = Employee::withTrashed()->orderByDesc('id')->get();
    }

    public function select()
    {
        $this->selectAll = !$this->selectAll;
        $this->selected = $this->selectAll ? $this->employees->pluck('id')->toArray() : [];
    }

    public function confirmed()
    {
        $this->confirm(__('ui.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => (__('ui.cancel')),
            'confirmButtonText' => (__('ui.confirm')),
            'onConfirmed' => 'deleteCheckedEmployee',
        ]);
    }

    public function deleteCheckedEmployee()
    {
        Employee::whereIn('id', $this->selected)->forceDelete();

        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);

        redirect()->route('employees');
    }
    public function render()
    {
        return view('livewire.employee.delete');
    }
}
