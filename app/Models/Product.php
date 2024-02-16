<?php

namespace App\Models;

use App\Traits\ScopeActive;
use App\Traits\UsesUuid;
use Illuminate\Database\Eloquent\Model as ModelParent;
use App\QueryBuilders\ProductQueryBuilder;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Product extends  ModelParent
{
    use HasFactory, SoftDeletes, UsesUuid, ScopeActive;

    protected $fillable = [
        'model_id',
        'user_id',
        'factory_id',
        'status',
        'activated_at',
        'expaire_at'
    ];

    public function newEloquentBuilder($query): ProductQueryBuilder 
    {
         return new ProductQueryBuilder($query);
    }

    public function model(): BelongsTo
    {
        return $this->belongsTo(Model::class);
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }

    public function factory(): BelongsTo
    {
        return $this->belongsTo(Factory::class);
    }
}