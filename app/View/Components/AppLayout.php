<?php

namespace App\View\Components;

use Illuminate\View\Component;

class AppLayout extends Component
{
    public $langs;

    /**
     * Get the view / contents that represents the component.
     *
     * @return \Illuminate\View\View
     *
     */

    public function __construct()
    {
        $this->langs = [
            'en' => 'English',
            'ar' => 'عربي',
        ];

    }
    public function render()
    {
        return view('layouts.app' );
    }
}
