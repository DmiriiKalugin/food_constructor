<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientTypeModel extends Model
{
    protected $table = 'ingredient_type';

    public $timestamps = false;
    protected $fillable = [
        'id',
        'title',
        'code'
    ];
}
