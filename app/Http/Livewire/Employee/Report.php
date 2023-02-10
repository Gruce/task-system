<?php

namespace App\Http\Livewire\Employee;

use App\Models\Employee;
use Livewire\Component;
use Asantibanez\LivewireCharts\Models\ColumnChartModel;

class Report extends Component
{
    public $employees;
    public $date;
    public function mount()
    {
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
        $this->employees = Employee::with(['tasks' => fn ($q) => $q->whereMonth('start_at', date('m', strtotime($this->date)))->whereYear('start_at', date('Y', strtotime($this->date)))])->get();
        return view('livewire.employee.report');
    }
}
