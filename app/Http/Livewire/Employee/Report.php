<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class Report extends Component
{
    public $employees;
    public function mount()
    {
        $this->employees = Employee::with(['tasks'])->get();
        $this->date = date('Y-m-d');
    }

    function rand_color()
    {
        return '#' . str_pad(dechex(mt_rand(0, 0xFFFFFF)), 6, '0', STR_PAD_LEFT);
    }

    public function getColumnChartModelProperty()
    {

        $columnChartModel = new ColumnChartModel();
        $columnChartModel->setTitle(__('ui.tasks'));
        foreach ($this->employees as $employee) {
            $columnChartModel->addColumn($employee->name, $employee->tasks->count(), $this->rand_color());
        }
        return $columnChartModel;
    }
    public function render()
    {
        return view('livewire.employee.report');
    }
}
