<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class UserQueryBuilder extends Builder
{

    public function activeItem($id): UserQueryBuilder
    {
        return $this;
    }

    public function activeItems(): UserQueryBuilder
    {
        return $this;
    }
}