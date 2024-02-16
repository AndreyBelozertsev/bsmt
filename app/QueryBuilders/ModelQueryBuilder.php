<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class ModelQueryBuilder extends Builder
{

    public function activeItem($id): ModelQueryBuilder
    {
        return $this;
    }

    public function activeItems(): ModelQueryBuilder
    {
        return $this;
    }


}