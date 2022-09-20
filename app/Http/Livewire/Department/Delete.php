<?php

namespace App\Http\Livewire\Department;

use App\Models\Department;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Delete extends Component
{
    use LivewireAlert;
    protected $listeners = ['$refresh', 'deleteCheckedDepartment'];
    public $selectAll = false;
    public $selected = [];

    public function mount()
    {
        $this->departments = Department::orderByDesc('id')->get();
    }

    public function select()
    {
        $this->selectAll = !$this->selectAll;
        $this->selected = $this->selectAll ? $this->departments->pluck('id')->toArray() : [];
    }

    public function confirmed()
    {
        $this->confirm(__('ui.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => (__('ui.cancel')),
            'confirmButtonText' => (__('ui.confirm')),
            'onConfirmed' => 'deleteCheckedDepartment',
        ]);
    }

    public function deleteCheckedDepartment()
    {
        Department::whereIn('id', $this->selected)->forceDelete();

        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);

        redirect()->route('department');
    }
    public function render()
    {
        return view('livewire.department.delete');
    }
}
