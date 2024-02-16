<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}"
    x-data
    :class="$store.darkMode.on && 'dark'"
>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>{{ config('app.name') }}</title>
        @moonShineAssets
        @vite(['resources/css/app.css' ,'resources/js/app.js'])
    </head>

    <x-moonshine::layout >
        <x-moonshine::layout.top-bar logo=" ">
            <x-slot:profile>
                @auth
                    <x-moonshine::layout.profile 
                        :route="route('master.index')"
                        :log-out-route="route('logout')" />
                @elseguest
                    <x-moonshine::link-button :href="route('login')" >
                        Войти
                    </x-moonshine::link-button >
                @endauth
            </x-slot:profile>  
        </x-moonshine::layout.top-bar >

        <x-moonshine::layout.flash />
        <x-moonshine::layout.content />


    </x-moonshine::layout>
</html>
