<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\Product;
use MoonShine\Fields\ID;

use MoonShine\Fields\Date;
use MoonShine\Fields\Switcher;
use MoonShine\Decorations\Block;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<Product>
 */
class ProductResource extends ModelResource
{
    protected string $model = Product::class;

    protected string $title = 'Изделия';

    protected string $sortColumn = 'created_at';
 
    protected string $sortDirection = 'DESC';

    public function fields(): array
    {
        return [
            Block::make([
                ID::make(),

                BelongsTo::make('Фабрика', 'factory', fn($item) => $item->title )
                    ->required(),

                BelongsTo::make('Мастер', 'user', fn($item) => $item->name )
                    ->required(),

                BelongsTo::make('Модель', 'model', fn($item) => $item->title )
                    ->required(),

                Date::make('Дата время изготовления', 'created_at')
                    ->format("d.m.Y в H:i")
                    ->default(now()->toDateTimeString())
                    ->sortable()
                    ->hideOnForm()
                    ->showOnExport(),
                    
                Date::make('Дата время активации', 'activated_at')
                    ->format("d.m.Y в H:i")
                    ->default(now()->toDateTimeString())
                    ->sortable()
                    ->hideOnForm()
                    ->showOnExport(),

                Date::make('Гарантия до', 'expaire_at')
                    ->format("d.m.Y")
                    ->default(now()->toDateTimeString())
                    ->sortable()
                    ->hideOnForm()
                    ->showOnExport(),

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


// $table->uuid('id')->primary();
// $table->foreignIdFor(Model::class)
//         ->nullable()
//         ->constrained()
//         ->onUpdate('cascade')
//         ->nullOnDelete('cascade');
// $table->foreignIdFor(User::class)
//         ->nullable()
//         ->constrained()
//         ->onUpdate('cascade')
//         ->nullOnDelete('cascade');
// $table->boolean('status')->default(true);
// $table->timestamp('activated_at')->nullable();
// $table->timestamp('expaire_at')->nullable();
// $table->timestamps();
// $table->softDeletes();
