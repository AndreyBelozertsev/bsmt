<?php
namespace App\Traits;


use Illuminate\Database\Eloquent\Model;


trait HasSlug
{

    protected static function bootHasSlug()
    {
        
        static::creating(function(Model $model){
            $model->makeSlug();
        });
    }

    protected function makeSlug():void
    {
        $slug = $this->slugUnique(
            str($this->{$this->slugFrom()})
                ->slug()
                ->value()
        );
        $this->{$this->slugColumn()} = $this->{$this->slugColumn()} ?? $slug;
    }

    protected function slugColumn():string
    {
        return 'slug';
    }

    protected function slugFrom():string
    {
        return 'title';
    }

    protected function slugUnique(string $slug):string
    {
        $originalSlug = $slug;
        $i=0;

        while($this->isSlugExsist($slug)){
            $i++;
            $slug = $originalSlug . '-' . $i;
        }

        return $slug;
    }

    protected function isSlugExsist(string $slug):bool
    {
        $query = $this->newQuery()
            ->where(self::slugColumn(), $slug)
            ->where($this->getKeyName, '!=', $this->getKey())
            ->withOutGlobalScopes();

        return $query->exists();
    }

}
