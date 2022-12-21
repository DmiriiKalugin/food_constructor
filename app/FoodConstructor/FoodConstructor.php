<?php

namespace App\FoodConstructor;

use App\Models\IngredientTypeModel;
use App\Models\IngredientModel;

class FoodConstructor
{
    public static function food_constructor($code){
        $ingredient_type = IngredientTypeModel::all();
        $ingredient = IngredientModel::all();

        $arrayAll = array();

        $arrayType = array();
        $count = 0;

        foreach (str_split($code) as $value){
            $type = $ingredient_type->where('code', $value);

            $arrayType[] = [
                'index' => $count,
                'ingredient_type' => $type->value('title'),
                'ingredient_type_id' => $type->value('id')
            ];

            $count++;
        }

        for ($i = 1; $i <= count($ingredient); $i++) {
            $ingredients = $ingredient->where('id', $i);
            $ingredients_types = $ingredient_type->where('id', $ingredients->value('type_id'));

            if ($ingredients->value('type_id') == $ingredients_types->value('id')) {
                foreach ($arrayType as $value) {
                    if ($value['ingredient_type_id'] == $ingredients_types->value('id')) {
                        $arrayAll[$value['index']][] = [
                            'type' => $ingredients_types->value('title'),
                            'value' => $ingredients->value('title')
                        ];
                    }
                }
            }
        }

        return create_a_dish($arrayAll);
    }
}

function create_a_dish($array){
    $variants = array();
    $result = array();
    $size_array = sizeof($array);

    function recursive_search_for_all_options($array, $variants, $level, $result, $size_array){
        $ingredient = IngredientModel::all();

        $level++;

        if ($level < $size_array) {
            foreach ($array[$level] as $value) {
                $variants [$level] = $value;

                $result = recursive_search_for_all_options($array, $variants, $level, $result, $size_array);
            }
        } else {
            $price = 0;

            for ($i = 0; $i < $size_array; $i++) {
                $price = $price + $ingredient->where('title', $variants[$i]['value'])->value('price');
            }

            $filter_double = array_count_values(array_column($variants, 'value'));

            if (sizeof($filter_double) == $size_array) {
                $result[] = [
                    'products' => [
                        $variants
                    ],
                    'price' => $price
                ];
            }
        }

        return $result;
    }

    return recursive_search_for_all_options($array, $variants, -1, $result, $size_array);
}
