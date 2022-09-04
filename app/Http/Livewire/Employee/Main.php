<?php

namespace App\Http\Livewire\Employee;

use Livewire\Component;

class Main extends Component
{
    protected $listeners = ['$refresh', 'updatedSelectedTab'];
    public function updatedSelectedTab($value)
    {
        $this->selectedTab = $value;
    }

    public function mount()
    {
        $this->tabs = [__('ui.projects'), __('ui.add')];
        $this->selectedTab = 0;
    }
    public function render()
    {
        return view('livewire.employee.main');
    }
}
