<?php

namespace App\Http\Livewire\Home;

use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Livewire\Component;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class Home extends Component

{
    public function render()
    {
        $columnChartModel = LivewireCharts::ColumnChartModel()
            ->setTitle('')
            ->addColumn('Week 1', 100, '#f6ad55')
            ->addColumn('Week 2', 200, '#fc8181')
            ->addColumn('Week 3', 300, '#90cdf4')
            ->addColumn('Week 4', 300, '#566342');

        return view('livewire.Home.Home')
            ->with([
                'columnChartModel' => $columnChartModel,
            ]);
    }
}
