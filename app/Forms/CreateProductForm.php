<?php 
namespace App\Forms;
use App\Models\Model;
use MoonShine\Fields\Select;
use MoonShine\Components\FormBuilder;

Class CreateProductForm
{
    public static function make() :FormBuilder
    {   
        
        return FormBuilder::make()
            ->action(route('master.product.store'))
            ->fields([
                Select::make('Модель изделия', 'model_id')
                    ->required()
                    ->options(Model::all()->pluck('title','id')->toArray()),

            ])->submit('Сгенерировать QR код', [
                'class' => 'btn-secondary btn-lg w-full',
            ]);
        
    }

}