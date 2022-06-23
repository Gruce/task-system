<?php

namespace App\Http\Livewire\Employee\Profile;

use App\Models\Employee;
use Livewire\Component;

class Show extends Component
{
    public function mount($id)
    {
        $this->employee = Employee::with(['tasks', 'files'])
            ->withCount(['tasks', 'files'])
            ->findOrFail($id);
    }
    public function render()
    {
        return view('livewire.employee.profile.show');
    }
}
