<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class Card extends Component
{
    /**
     * Create a new component instance.
     */
    public ?int $cardData;
    public string $title;
    public ?int $revenue;
    public function __construct(?int $cardData=null,$title,?int $revenue=null)
    {
        $this->cardData=$cardData;
        $this->title=$title;
        $this->revenue=$revenue;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.card');
    }
}
