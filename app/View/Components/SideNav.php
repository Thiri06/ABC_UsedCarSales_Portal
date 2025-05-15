<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class SideNav extends Component
{
    public $isAdmin;

    /**
     * Create a new component instance.
     *
     * @param bool $isAdmin
     */
    public function __construct($isAdmin)
    {
        $this->isAdmin = $isAdmin;
    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate\Contracts\View\View|string
     */
    public function render()
    {
        return view('components.side-nav');
    }
}
