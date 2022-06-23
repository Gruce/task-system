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

    protected $listeners = ['$refresh' , 'delete' , 'deleteFile'];

    protected $rules = [
        'task.title' => 'required',
        'task.project_id' => 'required',
        'task.importance' => 'required',
        'task.start_at' => 'required',
        'task.end_at' => 'required',
        'task.description' => 'required',
    ];

    public $task, $ID, $search, $userId, $modal = false;
    public $files = [] , $file_id;

    public function mount($task){
        $this->task = $task;
    }

    public function edit_name(){
        $this->task->save();
        $this->alert('success', __('ui.data_has_been_edited_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
    }

    public function toggleModal(){
        $this->modal = !$this->modal;
    }




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
