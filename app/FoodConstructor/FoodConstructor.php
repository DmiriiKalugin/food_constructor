<?php

namespace App\FoodConstructor;

use App\Models\IngredientTypeModel;
use App\Models\IngredientModel;

class FoodConstructor
{
    public static function food_constructor($code){
        $type = IngredientTypeModel::all();
        $ingredient = IngredientModel::all();

        return $type;
    }
}
