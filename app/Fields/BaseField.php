<?php

namespace App\Fields;

use Collective\Html\FormFacade;

class BaseField {
    public $class;
    public $id;
    public $placeholder;
    public $label;
    public $label_class;
    public $name;
    public $type;
    public $value;
    public $additionals_field;
    public $additionals_label;
    public $columns;
    public $xsColumn;
    public $smColumn;
    public $mdColumn;
    public $lgColumn;
    public $xlColumn;

    public function render()
    {
        $html = '
            <div class="form-group '. $this->getColumns() .'">
                '. FormFacade::label($this->name, $this->label, ['class' => $this->label_class, $this->additionals_label]) .'
                '. FormFacade::{$this->type}($this->name, $this->value, ['class' => $this->class, 'placeholder' => $this->placeholder, $this->additionals_field]) .'
            </div>
        ';
        return $html;
    }

    public function placeholder($placeholder)
    {
        $this->placeholder = $placeholder?? __('Wprowadź wartość');
        return $this;
    }

    public function name($name)
    {
        $this->name = $name;
        return $this;
    }

    public function id($id)
    {
        $this->id = $id;
        return $this;
    }

    public function value($value)
    {
        $this->value = $value?? null;
        return $this;
    }

    public function class($class)
    {
        $this->class = $class;
        return $this;
    }

    public function label($label)
    {
        $this->label = $label?? $this->formatNameLabel();
        return $this;
    }

    public function labelClass($class)
    {
        $this->label_class = $class;
        return $this;
    }

    public function additionalsField($additionals)
    {
        $this->additionals_field = $additionals?? [];
        return $this;
    }

    public function additionalsLabel($additionals)
    {
        $this->additionals_label = $additionals?? [];
        return $this;
    }

    public function column(int $column)
    {
        $this->columns = 'col-12 col-lg-' . $column;

        return $this;
    }

    public function xsColumn(int $column)
    {
        $this->xsColumn = $column;
        return $this;
    }

    public function smColumn(int $column)
    {
        $this->smColumn = $column;
        return $this;
    }

    public function mdColumn(int $column)
    {
        $this->mdColumn = $column;
        return $this;
    }

    public function lgColumn(int $column)
    {
        $this->lgColumn = $column;
        return $this;
    }

    public function xlColumn(int $column)
    {
        $this->xlColumn = $column;
        return $this;
    }

    private function getColumns()
    {
        if ($this->columns) {
            return $this->columns;
        }
        $column = '';

        if ($this->xsColumn) {
            $column .= 'col-' . $this->xsColumn;
        } else {
            $column .= 'col-12';
        }

        if ($this->smColumn) {
            $column .= ' col-sm-' . $this->smColumn;
        }

        if ($this->mdColumn) {
            $column .= ' col-md-' . $this->mdColumn;
        }

        if ($this->lgColumn) {
            $column .= ' col-lg-' . $this->lgColumn;
        }

        if ($this->xlColumn) {
            $column .= ' col-xl-' . $this->xlColumn;
        }
        return $column;
    }

    private function formatNameLabel()
    {
        return ucfirst($this->name);
    }
}
