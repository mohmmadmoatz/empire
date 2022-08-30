<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use App\Models\Project;

class ProjectComponent implements CRUDComponent
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
        return Project::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
        return [
            "name",
            "site",
            "space_site",
            "space_build",
            "floor_count",
            "starting_date",
            "office_perctange",
            "budget",
           
        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return [
            "name",
            "site",
            "space_site",
            "space_build",
            "floor_count",
            "starting_date",
            "office_perctange",
            "budget"
        ];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "text", "file", "textarea", "password", "number", "email", "select"
    public function inputs()
    {
        return [
            "customer_id"=>"number",
            "name"=>"text",
            "site"=>"text",
            "space_site"=>"text",
            "space_build"=>"text",
            "floor_count"=>"text",
            "starting_date"=>"text",
            "office_perctange"=>"number"
        ];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [
            'name'=>'required',
            'customer_id'=>'required'
        ];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
