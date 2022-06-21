<?php

namespace App\Http\Livewire\Project\Show;

use Livewire\Component;

class Users extends Component
{
    public $userId;
    public $search;


    /* Addition
        After addition reset $userId, $search to null
    */

    public function mount($employees){
        $this->employees = $employees;
        debug($this->employees->toArray());
    }

    public function render(){
        return view('livewire.project.show.users');
    }
}
