<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use App\QueryBuilders\FactoryQueryBuilder;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Factory extends Model
{
    use HasFactory;

    public function newEloquentBuilder($query): FactoryQueryBuilder 
    {
         return new FactoryQueryBuilder($query);
    }

    public function users(): HasMany
    {
        return $this->hasMany(User::class);
    }

    public function products(): HasMany
    {
        return $this->hasMany(Product::class);
    }
}
