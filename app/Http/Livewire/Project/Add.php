<?php

namespace App\Http\Livewire\Project;

use App\Models\File;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use Livewire\WithFileUploads;
use App\Models\Project;


class Add extends Component
{
    use WithFileUploads , LivewireAlert;
    public $project;
    public $files = [];

    protected $rules = [
        // project
        'project.title' => 'required',
        // 'files' => '',

    ];

    public function removeFile($index){
        unset($this->files[$index]);
        dg($this->files);
    }

    public function add(){
        $this->validate();
        $project = Project::create($this->project);

        if(count($this->files) > 0)
            foreach($this->files as $file){
                $new_file = $project->files()->create([
                    'name' => 'File',
                ]);
                $new_file->add_file('name' , $file , 'projects/' . $project->id . '/files/' . $new_file->id);
            }

        $this->emitTo('project.index' , '$refresh');
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
        return view('livewire.project.add');
    }
}
