<?php

declare(strict_types=1);

namespace App\Providers;

use MoonShine\MoonShine;
use MoonShine\Menu\MenuItem;
use MoonShine\Menu\MenuGroup;
use App\MoonShine\Resources\UserResource;
use App\MoonShine\Resources\ModelResource;
use App\MoonShine\Resources\FactoryResource;
use App\MoonShine\Resources\ProductResource;
use App\MoonShine\Resources\MoonShineUserResource;
use App\MoonShine\Resources\MoonShineUserRoleResource;
use MoonShine\Providers\MoonShineApplicationServiceProvider;

class MoonShineServiceProvider extends MoonShineApplicationServiceProvider
{
        /**
     * Bootstrap any application services.
     */
    public function boot(): void
    {
        parent::boot();

        // moonshineColors()
        // ->background('#F1F1F2')
        // ->content('#A3C3D9')
        // ->tableRow('#AE76A6')
        // ->dividers('#AE76A6')
        // ->borders('#AE76A6')
        // ->buttons('#AE76A6')
        // ->primary('#002283')
        // ->secondary('#00880c')
        // ->menuLinkColor('#000000')
        // ->menuDropdownBg('#FFFFFF')
        // ->{'dark-200'}('#000000');
    }

    protected function resources(): array
    {
        return [];
    }

    protected function pages(): array
    {
        return [];
    }

    protected function menu(): array
    {
        return [
            MenuGroup::make(static fn() => __('moonshine::ui.resource.system'), [
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.admins_title'),
                   new MoonShineUserResource()
               ),
               MenuItem::make(
                   static fn() => __('moonshine::ui.resource.role_title'),
                   new MoonShineUserRoleResource()
               ),
            ]),
            MenuGroup::make(static fn() => 'Продукция', [
                MenuItem::make(
                    static fn() => 'Модели',
                    new ModelResource()
                )
                    ->icon('heroicons.clipboard-document-list'),
                MenuItem::make(
                    static fn() => 'Изделия',
                    new ProductResource()
                )
                    ->icon('heroicons.queue-list'),
             ])
            ->icon('heroicons.rocket-launch'),

             MenuGroup::make(static fn() => 'Фабрики', [
                MenuItem::make(
                    static fn() => 'Фабрики',
                    new FactoryResource()
                )
                    ->icon('heroicons.clipboard-document-list'),
                MenuItem::make(
                    static fn() => 'Мастера',
                    new UserResource()
                )
                    ->icon('heroicons.queue-list'),
             ])
            ->icon('heroicons.rocket-launch'),


        ];
    }

    /**
     * @return array{css: string, colors: array, darkColors: array}
     */
    protected function theme(): array
    {
        return [];
    }
}
