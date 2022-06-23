<?php

namespace App\Http\Livewire\Task;

use Livewire\Component;
use App\Models\Task;
use Livewire\WithFileUploads;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Card extends Component
{
    use LivewireAlert;
    use WithFileUploads;

    protected $listeners = ['$refresh' , 'delete' ,'deleteFile'];

    protected $rules = [
        'title' => 'required',
        'importance' => 'required',
        'start_at' => 'required',
        'end_at' => 'required',
    ];

    public $task, $ID;
    public $files = [] , $file_id;

    public function mount($task){
        $this->task = $task;
    }

    public function confirmed($id){
        dd('ll');
        $this->ID = $id;
        $this->confirm(__('ui.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => (__('ui.cancel')),
            'confirmButtonText' => (__('ui.confirm')),
            'onConfirmed' => 'delete',
        ]);
    }

    public function delete(){
        Task::findOrFail($this->ID)->delete();
        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
        $this->emitTo( 'task.all' ,'$refresh');
    }

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
        dd('k');
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


    // public function edit(){
    //     $this->validate();
    //     $task = Task::findOrFail($this->ID);
    //     $task->edit([
    //         'title' => $this->title,
    //         'description' => $this->description,
    //         'importance' => $this->importance,
    //         'start_at' => $this->start_at,
    //         'end_at' => $this->end_at,
    //     ]);

    //     $this->alert('success', 'تم التعديل', [
    //         'position' => 'center',
    //         'timer' => 3000,
    //         'toast' => true,
    //     ]);
    // }

    public function render(){


        dg($this->task->toArray());
        return view('livewire.task.card');
    }
}
