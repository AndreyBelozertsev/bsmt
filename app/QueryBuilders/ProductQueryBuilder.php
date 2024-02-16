<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class ProductQueryBuilder extends Builder
{

    public function activeItem($id): ProductQueryBuilder
    {
        return $this;
    }

    public function activeItems(): ProductQueryBuilder
    {
        return $this;
    }
}