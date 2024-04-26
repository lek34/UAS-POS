<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class payment extends Component
{
    public $id;
    public $route;
    public $kontrak;
    public $model;
    public $modelAttribute; // Added property for dynamic attribute display
    /**
     * Create a new component instance.
     */
    public function __construct(int $id, string $route, $model = null, string $modelAttribute = null, string $kontrak = null)
    {
        $this->id = $id;
        $this->route = $route;
        $this->kontrak = $kontrak;
        $this->model = $model;
        $this->modelAttribute = $modelAttribute;
    }

    /**
     * Get the view / contents that represent the component.
     */
    public function render(): View|Closure|string
    {
        return view('components.payment');
    }
}
