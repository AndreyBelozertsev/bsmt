<?php 
namespace App\Forms;
use MoonShine\Fields\Email;
use MoonShine\Fields\Password;
use MoonShine\Fields\Switcher;
use MoonShine\Components\FormBuilder;

Class LoginForm
{
    public static function make() :FormBuilder
    {
        return FormBuilder::make()
            ->customAttributes([
                'class' => 'authentication-form',
            ])
            ->action(route('login'))
            ->fields([
                Email::make('Email', 'email')
                    ->required()
                    ->customAttributes([
                        'autofocus' => true,
                        'autocomplete' => 'email',
                    ]),

                Password::make('Пароль', 'password')
                    ->required(),

                Switcher::make('Запомнить?', 'remember'),
            ])->submit('Войти', [
                'class' => 'btn-primary btn-lg w-full',
            ]);
        
    }

}