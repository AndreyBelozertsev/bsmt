<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Factory;

use MoonShine\Fields\Text;
use MoonShine\Fields\Switcher;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;

/**
 * @extends ModelResource<Factory>
 */
class FactoryResource extends ModelResource
{
    protected string $model = Factory::class;

    protected string $title = 'Фабрики';

    public function fields(): array
    {
        return [
            Block::make([
                Text::make('Заголовок', 'title')
                    ->required(),
                    
                Switcher::make('Активный', 'status')
                    ->required()
                    ->default(true)
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
