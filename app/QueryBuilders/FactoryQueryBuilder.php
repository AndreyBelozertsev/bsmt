<?php

namespace App\QueryBuilders;

use Illuminate\Database\Eloquent\Builder;

class FactoryQueryBuilder extends Builder
{

     public function activeItem($id): FactoryQueryBuilder
     {
          return $this;
     }

     public function activeItems(): FactoryQueryBuilder
     {
          return $this;
     }
}