<?php

namespace App\Fields;

use Collective\Html\FormFacade;

class ColumnSend
{
    public $name;
    public $fields;
    public $columns;

    public function __construct($fields)
    {
        $this->fields = $fields;
    }

    public function render()
    {
        $html = '
            <div class="'. $this->columns .'">
                <div class="card">
                    <div class="card-header">
                        '. ucfirst($this->name) .'
                    </div>
                    <div class="card-body">
                        '. FormFacade::submit(__('Wyślij'), ['class' => 'btn btn-primary btn-block']) .'
                    </div>
                </div>
            </div>
        ';

        return $html;
    }

    public function column(int $column)
    {
        $this->columns = 'col-12 col-lg-' . $column;

        return $this;
    }

    public function name($name)
    {
        $this->name = $name?? __('Kolumna');
        return $this;
    }
}
