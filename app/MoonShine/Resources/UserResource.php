<?php

declare(strict_types=1);

namespace App\MoonShine\Resources;

use App\Models\User;

use MoonShine\Fields\ID;

use MoonShine\Fields\Date;
use MoonShine\Fields\Text;
use MoonShine\Fields\Email;
use MoonShine\Decorations\Tab;
use MoonShine\Fields\Password;
use MoonShine\Fields\Switcher;
use MoonShine\Decorations\Tabs;
use MoonShine\Decorations\Block;
use MoonShine\Decorations\Heading;
use MoonShine\Fields\PasswordRepeat;
use MoonShine\Resources\ModelResource;
use Illuminate\Database\Eloquent\Model;
use MoonShine\Fields\Relationships\BelongsTo;

/**
 * @extends ModelResource<User>
 */
class UserResource extends ModelResource
{
    protected string $model = User::class;

    protected string $title = 'Мастера';

    public function fields(): array
    {
        return [
            Block::make([
                Tabs::make([
                    Tab::make('Общая информация', [
                        Text::make('ФИО', 'name')
                            ->required()
                            ->showOnExport(),

                        Date::make('Дата добавления', 'created_at')
                            ->format("d.m.Y")
                            ->default(now()->toDateTimeString())
                            ->sortable()
                            ->hideOnForm()
                            ->showOnExport(),

                        BelongsTo::make('Фабрика', 'factory', fn($item) => $item->title )
                            ->required(),

                        Email::make('email', 'email')
                            ->sortable()
                            ->showOnExport()
                            ->required(),

                        Switcher::make('Активный', 'status')
                            ->required()
                            ->default(true)
                    ]),

                    Tab::make('Пароль', [
                        Heading::make('Изменить пароль'),

                        Password::make('Введите пароль', 'password')
                            ->customAttributes(['autocomplete' => 'new-password'])
                            ->hideOnIndex()
                            ->eye(),

                        PasswordRepeat::make('Повторите пароль', 'password_repeat')
                            ->customAttributes(['autocomplete' => 'confirm-password'])
                            ->hideOnIndex()
                            ->eye(),
                    ]),
                ]),
            ]),
        ];
    }

    public function rules(Model $item): array
    {
        return [];
    }
}
