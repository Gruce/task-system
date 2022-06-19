<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Sidebar extends Component
{
    /**
     * Create a new component instance.
     *
     * @return void
     */
    public $tabs;
    public $langs;

    /**
     * Create a new component instance.
     *
     * @return void
     */
    public function __construct()
    {
        $this->langs = [
            'en' => 'English',
            'ar' => 'عربي',
        ];

        $this->tabs = [
            new Tab(
                __('ui.menu'),
                [
                    new TabItem(__('ui.home'), 'fa-solid fa-home', 'home'),
                    new TabItem(__('ui.employees'), 'fa-solid fa-users', 'employees'),
                    new TabItem(__('ui.projects'), 'fa-solid fa-diagram-project', 'projects'),
                    new TabItem(__('ui.task'), 'fa-solid fa-list-check', 'task'),

                ]
            ),
            // new Tab(
            //     'Managements',
            //     [],
            //     true
            // ),
        ];

        $this->tabs = collect($this->tabs);
        $this->tabs = $this->tabs->filter(function ($tab) {
            if ($tab->forAdmin) {
                if (auth()->user())
                    return auth()->user()->is_admin;
                else return false;
            }
            return true;
        })->toArray();
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|\Closure|string
     */
    public function render()
    {
        return view('components.sidebar');
    }
}

class Tab
{
    public $title;
    public $items;
    public $forAdmin;

    public function __construct($title, $items, $forAdmin = false)
    {
        $this->title = $title;
        $this->items = collect($items)->filter(function ($item) {
            if (isset($item->auth))
                return $item->auth == Auth::check();
            return true;
        })->all();
        $this->forAdmin = $forAdmin;
    }
}

class TabItem
{
    public $title;
    public $icon;
    public $route;
    public $active;
    public $auth;

    public function __construct($title = 'Tab Item', $icon = 'fa-solid fa-archway', $route = 'home', $auth = null)
    {
        $this->title = $title;
        $this->icon = $icon;
        $this->route = $route;
        $this->active = request()->routeIs($route . '*');
        $this->auth = $auth;
    }
}
