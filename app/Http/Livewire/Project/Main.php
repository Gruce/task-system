<?php

namespace App\Http\Livewire\Project;

use App\Exports\ProjectsExport;
use App\Exports\ProjectsTableExport;
use Maatwebsite\Excel\Facades\Excel;
use Livewire\Component;

class Main extends Component
{
    protected $listeners = ['updatedSelectedTab'];
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


    public function render()
    {
        return view('livewire.project.main');
    }
}
