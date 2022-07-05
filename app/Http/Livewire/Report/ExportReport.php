<?php

namespace App\Http\Livewire\Report;

use Livewire\Component;

class ExportReport extends Component
{
    public $search;

    public function render()
    {
        $search = '%' . $this->search . '%';

        return view('livewire.report.export-report');
    }
}
