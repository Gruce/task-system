<?php

namespace App\View\Components;

use Illuminate\View\Component;

class MobileSidbar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $langs;
    public function __construct()
    {
        $this->langs = [
            'en' => 'English',
            'ar' => 'عربي',
        ];
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.mobile-sidbar');
    }
}
