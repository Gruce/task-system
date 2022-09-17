<?php

namespace App\Http\Livewire\Project;

use App\Models\Project;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Delete extends Component
{
    use LivewireAlert;
    protected $listeners = ['$refresh', 'deleteCheckedProject'];
    public $selectAll = false;
    public $selected = [];

    public function mount()
    {
        $this->projects = Project::orderByDesc('id')->get(['id', 'title', 'done']);
    }

    public function select()
    {
        $this->selectAll = !$this->selectAll;
        $this->selected = $this->selectAll ? $this->projects->pluck('id')->toArray() : [];
    }

    public function confirmed()
    {
        $this->confirm(__('ui.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => (__('ui.cancel')),
            'confirmButtonText' => (__('ui.confirm')),
            'onConfirmed' => 'deleteCheckedProject',
        ]);
    }

    public function deleteCheckedProject()
    {
        Project::whereIn('id', $this->selected)->delete();

        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);

        redirect()->route('projects');
    }



    public function render()
    {
        return view('livewire.project.delete');
    }
}
