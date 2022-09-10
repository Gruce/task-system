<?php

namespace App\Http\Livewire\Project;

use App\Exports\ProjectsExport;
use App\Exports\ProjectsTableExport;
use App\Models\Project;
use Illuminate\Support\Facades\DB;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\Component;
use Jantinnerezo\LivewireAlert\LivewireAlert;

class Main extends Component
{
    use LivewireAlert;
    protected $listeners = ['updatedSelectedTab', '$refresh', 'deleteAll'];
    public function updatedSelectedTab($value)
    {
        $this->selectedTab = $value;
    }

    public function mount()
    {
        $this->tabs = [__('ui.projects'), __('ui.add')];
        $this->selectedTab = 0;
    }

    public function export()
    {
        return Excel::download(new ProjectsTableExport, 'Projects ' . date('Y-m-d') . '.xlsx');
    }

    public function deleteAll()
    {
        DB::table('projects')->delete();
        $this->alert('success', __('ui.data_has_been_deleted_successfully'), [
            'position' => 'top',
            'timer' => 3000,
            'toast' => true,
            'timerProgressBar' => true,
            'width' => '400',
        ]);
        $this->emitTo('project.all', '$refresh');
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
        return view('livewire.project.main');
    }
}
