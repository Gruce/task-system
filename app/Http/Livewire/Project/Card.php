<?php

namespace App\Http\Livewire\Project;

use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Models\Project;
use App\Traits\Livewire\DeleteTrait;

class Card extends Component
{
    use LivewireAlert , DeleteTrait;

    protected $listeners = ['delete' , '$refresh'];
    public $project , $ID;

    protected $rules = [
        'project.title' => 'required',
    ];

    public function edit_name(){
        $this->project->save();
        $this->alert('success', __('ui.data_has_been_edited_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }

    public function confirmed($id){
        // make sure add 'delete' to listeners
        $this->confirmedDelete(new Project , $id , 'delete' ,['project.all']);
    }

    public function mount($project){
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.project.card');
    }
}
