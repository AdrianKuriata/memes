<?php

namespace App\Fields;

use App\Fields\BaseField;

use Collective\Html\FormFacade;

class FileField extends BaseField
{
    public function __construct()
    {
        $this->type = 'file';
    }

    public function render()
    {
        $html = '
            <div class="form-group '. $this->getColumns() .'">
                '. FormFacade::label($this->name, $this->label, ['class' => $this->label_class, $this->additionals_label]) .'
                '. FormFacade::{$this->type}($this->name, ['class' => $this->class, 'placeholder' => $this->placeholder, $this->additionals_field]) .'
            </div>
        ';
        return $html;
    }
}
