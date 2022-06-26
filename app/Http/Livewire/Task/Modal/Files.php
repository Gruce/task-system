<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
use App\Traits\Livewire\DeleteTrait;
use App\Models\File;
class Files extends Component
{
    use LivewireAlert,DeleteTrait , WithFileUploads;


    protected $listeners = ['$refresh' , 'delete'];

    public $task;
    public $files = [] , $file_id;

    public function updatedFiles($files){
        if (count($files) > 0)
        foreach ($files as $file) {
            if($file){
                $new_file = $this->task->files()->create([
                    'name' => 'File',
                ]);
                $new_file->add_file('name', $file, 'tasks/' . $this->task->id . '/files/' . $new_file->id);
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

    public function confirmed($id){
        // make sure add 'delete' to listeners
        if($this->task->files()->where('id' , $id)->exists())
            $this->confirmedDelete(new File , $id , 'delete' , ['task.modal.files']);

        else $this->alert('error', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }

    public function render()
    {
        return view('livewire.task.modal.files');
    }
}
