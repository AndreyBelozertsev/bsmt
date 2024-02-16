<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\QueryBuilders\CategoryQueryBuilder;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    public function newEloquentBuilder($query): CategoryQueryBuilder 
    {
         return new CategoryQueryBuilder($query);
    }
}
