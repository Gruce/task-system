<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Project;

class Card extends Component
{
    use LivewireAlert;

    protected $listeners = ['delete'];
    public $project , $ID;

    public function confirmed($id, $function){
        $this->ID = $id;
        $this->confirm(__('ui.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => (__('ui.cancel')),
            'confirmButtonText' => (__('ui.confirm')),
            'onConfirmed' => $function,
        ]);
    }

    public function delete(){
        Project::findOrFail($this->ID)->delete();
        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
        $this->emitTo( 'project.all' ,'$refresh');
    }

    public function mount($project){
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.project.card');
    }
}
