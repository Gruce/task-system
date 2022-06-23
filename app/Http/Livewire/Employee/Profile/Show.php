<?php

namespace App\Http\Livewire\Employee\Profile;

use Livewire\Component;
use Asantibanez\LivewireCharts\Facades\LivewireCharts;
use Asantibanez\LivewireCharts\Models\RadarChartModel;
use Asantibanez\LivewireCharts\Models\TreeMapChartModel;
use App\Models\Task;
use App\Models\Employee;

class Show extends Component
{
    // LivewireCharts::lineChartModel();

    public function render()
    {
        $employee = auth()->user()->employee()->with('tasks')->first();
        $tasks = $employee->tasks;

        $lineChartModel = LivewireCharts::lineChartModel()
            ->setTitle('Tasks ' . $tasks)
            ->setAnimated(true)
            // ->sparklined()
            ->multiLine();

        foreach($tasks as $data){
            $lineChartModel->addSeriesPoint('somthing' , $data->start_at, $data->state);
        }

        // dd($lineChartModel);
        return view('livewire.employee.profile.show' , ['lineChartModel' => $lineChartModel]);
    }
}
