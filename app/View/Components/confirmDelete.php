<?php

namespace App\View\Components;

use Closure;
use Illuminate\Contracts\View\View;
use Illuminate\View\Component;

class confirmDelete extends Component
{
    public $id;
    public $route;
    public $model;
    public $modelAttribute; // Added property for dynamic attribute display

    /**
     * Create a new component instance.
     *
     * @param int $id
     * @param string $route
     * @param string $modelAttribute (optional) Attribute to display in the confirmation message
     * @return void
     */
    public function __construct(int $id, string $route, $model = null, string $modelAttribute = null)
    {
        $this->id = $id;
        $this->route = $route;
        $this->model = $model;
        $this->modelAttribute = $modelAttribute;

    }

    /**
     * Get the view / contents that represent the component.
     *
     * @return \Illuminate::View\View|string
     */
    public function render()
    {
        return view('components.confirm-delete');
    }
}
