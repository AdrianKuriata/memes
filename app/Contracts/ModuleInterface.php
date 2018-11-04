<?php

namespace App\Contracts;

/**
 * Module interface for Models
 */
interface ModuleInterface {
    /**
     * Columns which should be display in index table
     * @return array Columns
     */
    public function getColumns();

    /**
     * Field which should be display in index table
     * @return array Fields
     */
    public function getFields();

    /**
     * List of fields which should be used in request only instance
     * @return array Fields
     */
    public function saveFields();

    /**
     * Form fields which should be display in edit and create forms
     * @return array Fields
     */
    public function getForm();

    /**
     * Define rules for this module
     * @return array Rules
     */
    public function getRules();
}
