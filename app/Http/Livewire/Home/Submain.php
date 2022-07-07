<?php

namespace App\Http\Livewire\Home;

use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;
class Submain extends Component
{
    public function render()
    {
        $columnChartModel = LivewireCharts::ColumnChartModel()
            ->setTitle('')
            ->addColumn('Week 1', 100, '#f6ad55')
            ->addColumn('Week 2', 200, '#fc8181')
            ->addColumn('Week 3', 300, '#90cdf4')
            ->addColumn('Week 4', 300, '#566342');
            return view('livewire.home.submain')->with([
            'columnChartModel' => $columnChartModel,
        ]);
    }
}
