<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class Main extends Component
{
    public $project;
    public function render()
    {

        return view('livewire.home.main');
    }
}
