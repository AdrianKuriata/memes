<?php

namespace App\Fields;

use App\Fields\BaseField;

class EmailField extends BaseField
{
    public function __construct()
    {
        $this->type = 'email';
    }
}
