<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Model;

use MoonShine\Fields\Text;
use Illuminate\Support\Str;
use MoonShine\Fields\Image;
use MoonShine\Fields\Number;
use MoonShine\Fields\TinyMce;
use MoonShine\Fields\Switcher;
use MoonShine\Fields\Textarea;
use MoonShine\Decorations\Block;
use Illuminate\Http\UploadedFile;
use Illuminate\Database\Eloquent\Model as ModelParent;
use MoonShine\Resources\ModelResource as MoonshineModelResource;

/**
 * @extends MoonshineModelResource<Model>
 */
class ModelResource extends MoonshineModelResource
{
    protected string $model = Model::class;

    protected string $title = 'Модели';

    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Заголовок', 'title')
                    ->required(),

                Textarea::make('Краткое описание','description')
                    ->hideOnIndex(),

                TinyMce::make('Содержание','content')
                    ->hideOnIndex(),

                Image::make('Обложка','thumbnail') 
                    ->hideOnIndex()
                    ->removable()
                    ->customName(function (UploadedFile $file, Image $field){
                        return getUploadPath('article') . '/' . Str::random(10) . '.' . $file->extension();
                    })
                    ->allowedExtensions(['jpeg','png','jpg','gif','svg']),

                Image::make('Фото','images') 
                    ->hideOnIndex()
                    ->multiple()
                    ->removable() 
                    ->customName(function (UploadedFile $file, Image $field){
                         return getUploadPath('model') . '/' . Str::random(10) . '.' . $file->extension();
                    })
                    ->allowedExtensions(['jpeg','png','jpg']),

                Number::make('Гарантия', 'warranty')
                    ->required(),
                    
                Switcher::make('Активный', 'status')
                    ->required()
                    ->default(true)
            ]),
        ];
    }

    public function rules(ModelParent $item): array
    {
        return [];
    }
}
