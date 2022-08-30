<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use App\Models\OutPayment;

class OutpaymentComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = true;
    public $delete = true;
    public $update = true;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = false;

    public function getModel()
    {
        return Outpayment::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return ["description","date","amount"];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ["description","date","amount"];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "text", "file", "textarea", "password", "number", "email", "select"
    public function inputs()
    {
        return [
            "project_id"=>"number",
            "description"=>"textarea",
            "date"=>"text",
            "amount"=>"number",
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            "project_id"=>"required",
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
