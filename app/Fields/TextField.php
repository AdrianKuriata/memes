<?php

namespace App\Fields;

use App\Fields\BaseField;

class TextField extends BaseField
{
    public function __construct()
    {
        $this->type = 'text';
    }
}
