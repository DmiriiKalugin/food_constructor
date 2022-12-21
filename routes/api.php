<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

Route::post(
    'create_a_dish',
    'FoodConstructorControllers@create_a_dish'
);
