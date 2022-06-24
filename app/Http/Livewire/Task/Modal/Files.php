<?php

namespace App\Http\Livewire\Task\Modal;

use Livewire\Component;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;
class Files extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    protected $listeners = ['$refresh' , 'deleteFile'];

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

    public function confirmedFile($id, $function){
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

    public function deleteFile(){
        $this->task->files()->findOrFail($this->file_id)->delete();
        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
        $this->emitSelf('$refresh');
    }

    public function render()
    {
        return view('livewire.task.modal.files');
    }
}
