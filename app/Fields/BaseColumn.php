<?php

namespace App\Fields;

class BaseColumn
{
    public $name;
    public $fields;
    public $columns;
    public $xsColumn;
    public $smColumn;
    public $mdColumn;
    public $lgColumn;
    public $xlColumn;

    public function render()
    {
        $html = '
            <div class="'. $this->getColumns() .'">
                <div class="card">
                    <div class="card-header">
                        '. ucfirst($this->name) .'
                    </div>
                    <div class="card-body">
                        <div class="form-row">
                            '. implode(' ', $this->fields) .'
                        </div>
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

    public function name($name)
    {
        $this->name = $name?? __('Kolumna');
        return $this;
    }
}
