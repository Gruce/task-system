<?php

namespace App\Http\Livewire\Project;

use App\Exports\ProjectsExport;
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
        return Excel::download(new ProjectsExport, 'Projects.xlsx',  \Maatwebsite\Excel\Excel::MPDF);
    }


    public function render()
    {
        return view('livewire.project.main');
    }
}
