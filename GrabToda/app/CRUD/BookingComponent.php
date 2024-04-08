<?php

namespace App\CRUD;

use EasyPanel\Contracts\CRUDComponent;
use EasyPanel\Parsers\Fields\Field;
use App\Models\Booking;

class BookingComponent implements CRUDComponent
{
    // Manage actions in crud
    public $create = false;
    public $delete = true;
    public $update = false;

    // If you will set it true it will automatically
    // add `user_id` to create and update action
    public $with_user_id = true;

    public function getModel()
    {
        return Booking::class;
    }

    // which kind of data should be showed in list page
    public function fields()
    {
            return [
            'User ID' => 'user_id',
            'Pickup Location' => 'pickup_location',
            'Dropoff Location' => 'dropoff_location',
        ];
    }

    // Searchable fields, if you dont want search feature, remove it
    public function searchable()
    {
        return ['pickup_location', 'dropoff_location'];
    }

    // Write every fields in your db which you want to have a input
    // Available types : "ckeditor", "checkbox", "text", "select", "file", "textarea"
    // "password", "number", "email", "select", "date", "datetime", "time"
    public function inputs()
    {
        return [];
    }

    // Validation in update and create actions
    // It uses Laravel validation system
    public function validationRules()
    {
        return [];
    }

    // Where files will store for inputs
    public function storePaths()
    {
        return [];
    }
}
