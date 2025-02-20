<?php

namespace App\View\Components;

use Illuminate\View\Component;

class Table extends Component
{
    public $columns;
    public $models;

    // Aquí esperamos las variables columns y models
    public function __construct(array $columns, $models)
    {
        $this->columns = $columns;
        $this->models = $models;
    }

    public function render()
    {
        return view('components.table');
    }
}

