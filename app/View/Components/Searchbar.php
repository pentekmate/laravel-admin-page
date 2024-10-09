<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Searchbar extends Component
{
    /**
     * Create a new component instance.
     */
    public $placeholder;
    public $name;
    public $route;

    public function __construct($placeholder,$name,$route)
    {
        $this->name =$name;
        $this->route=$route;
        $this->placeholder=$placeholder;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.searchbar');
    }
}
