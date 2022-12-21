<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class IngredientModel extends Model
{
    protected $table = 'ingredient';

    public $timestamps = false;

    protected $fillable = [
        'id',
        'type_id',
        'title',
        'price'
    ];

    public function ingredientType()
    {
        return $this->hasOne(IngredientTypeModel::class,'id', 'type_id');
    }
}
