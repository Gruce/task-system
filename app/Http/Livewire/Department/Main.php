<?php

namespace App\Http\Livewire\Department;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Main extends Component
{
    protected $listeners = ['deleteAll'];
    use LivewireAlert;

    public function deleteAll()
    {
        DB::table('departments')->delete();
        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
        $this->emitTo('department.all', '$refresh');
    }

    public function confirmed()
    {
        $this->confirm(__('ui.are_you_sure'), [
            'toast' => false,
            'position' => 'center',
            'showConfirmButton' => "true",
            'cancelButtonText' => (__('ui.cancel')),
            'confirmButtonText' => (__('ui.confirm')),
            'onConfirmed' => 'deleteAll',
        ]);
    }

    public function render()
    {
        return view('livewire.department.main');
    }
}
