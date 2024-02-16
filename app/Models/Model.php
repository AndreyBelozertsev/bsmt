<?php

namespace App\Models;

use App\QueryBuilders\ModelQueryBuilder;
use App\Traits\HasSlug;
use App\Traits\ScopeActive;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model as ModelParent;

class Model extends ModelParent
{
    use HasFactory, ScopeActive, HasSlug;

    protected $casts = [
        "images"=> "array",
    ];

    public function newEloquentBuilder($query): ModelQueryBuilder 
    {
         return new ModelQueryBuilder($query);
    }


    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
