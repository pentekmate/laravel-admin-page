<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class TableComponent extends Component
{
    /**
     * Create a new component instance.
     */
    public $items;
    public $columns;
    public $editRoute;
    public $deleteRoute;
    public $modelName;
    public $columnWidths;
    public $links;
    public $filters;
    public $filterRoute;

     public function __construct($items, $columns, $editRoute, $deleteRoute, $modelName, $columnWidths = null, $links=null,$filters=null,$filterRoute=null)
    {
        $this->items = $items;
        $this->columns = $columns;
        $this->editRoute = $editRoute;
        $this->deleteRoute = $deleteRoute;
        $this->modelName = $modelName;
        $this->columnWidths = $columnWidths;
        $this->filters = $filters;
        $this->filterRoute = $filterRoute;
        $this->links = $links;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.table-component');
    }
}
