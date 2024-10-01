<?php

namespace App\View\Components;

use App\Models\Post;
use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\Database\Eloquent\Model;
use Illuminate\View\Component;

class Form extends Component
{
 
    public array $inputs;
    public string $action;
    public string $method;
    public ?Model $model;

    public function __construct(
        array $inputs,
        string $action,
        string $method,
        ?Model $model = null
    )
    {
        $this->inputs = $inputs;
        $this->action = $action;
        $this->method = $method;
        $this->model = $model;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.form');
    }
}
