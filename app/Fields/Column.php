<?php

namespace App\Fields;

use App\Fields\BaseColumn;

class Column extends BaseColumn
{
    public function __construct($fields)
    {
        $this->fields = $fields;
    }
}
