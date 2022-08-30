<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use App\Models\EndingAmount;

class EndingamountComponent implements CRUDComponent
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
         return EndingAmount::class;
     }
 
     // which kind of data should be showed in list page
     public function fields()
     {
         return ["description","amount","pay","rest"];
     }
 
     // Searchable fields, if you dont want search feature, remove it
     public function searchable()
     {
         return ["description","amount","pay","rest",'recive_name'];
     }
 
     // Write every fields in your db which you want to have a input
     // Available types : "ckeditor", "text", "file", "textarea", "password", "number", "email", "select"
     public function inputs()
     {
         return [
             "category_id"=>"number",
             "project_id"=>"number",
             "worker_id"=>"number",
             "amount"=>"number",
             "pay"=>"number",
             "rest"=>"number",
             "date"=>"text",
             "description"=>"textarea",
             "recive_name"=>"text",
             
         ];
     }
 
     // Validation in update and create actions
     // It uses Laravel validation system
     public function validationRules()
     {
         return [
             "category_id"=>"required",
             "project_id"=>"required",
             "worker_id"=>"required",
             "amount"=>"required"
 
         ];
     }
 
     // Where files will store for inputs
     public function storePaths()
     {
         return [];
     }
 }
 