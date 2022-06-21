<?php

namespace App\Http\Livewire\Project\Show;

use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class SideDetails extends Component
{
    protected $listeners = ['$refresh' , 'delete'];

    use WithFileUploads , LivewireAlert;
    public $files = [] , $file_id;

    public function updatedFiles($files){
        if (count($files) > 0)
        foreach ($files as $file) {
            if($file){
                $new_file = $this->project->files()->create([
                    'name' => 'File',
                ]);
                $new_file->add_file('name', $file, 'projects/' . $this->project->id . '/files/' . $new_file->id);
            }
        }

        $this->emitSelf('$refresh');

        $this->alert('success', __('ui.data_has_been_add_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }

    public function confirmed($id, $function){
        $this->file_id = $id;
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
        $this->project->files()->findOrFail($this->file_id)->delete();
        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);

        $this->emitSelf('$refresh');
    }

    public function mount($project){
        $this->project = $project;
    }

    public function render()
    {
        return view('livewire.project.show.side-details');
    }
}
