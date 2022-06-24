<?php
namespace App\Traits\Livewire;

trait DeleteTrait
{
    public $ID , $model ;

    public function confirmedDelete($model , $id , $emit = null){
        $this->model = $model;
        $this->ID = $id;
        $this->emit = $emit;

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
        $this->model->findOrFail($this->ID)->delete();
        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);

        if($this->emit)
            foreach($this->emit as $emit)
                $this->emitTo($emit , '$refresh');

    }

}
