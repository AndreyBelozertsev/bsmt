<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class CategoryQueryBuilder extends Builder
{

     public function activeItem($id): CategoryQueryBuilder
     {
          return $this;
     }

     public function activeItems(): CategoryQueryBuilder
     {
          return $this;
     }


}