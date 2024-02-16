<?php

namespace Database\Seeders;

use App\Models\Model;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class ModelSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $models = [
            [
                'title' => 'Стул',
                // 'slug'=> 'stul',    
            ], 
            [
                'title' => 'Полу-кресло',
                // 'slug'=> 'polu-kreslo',    
            ], 
            [
                'title' => 'Кресло',
                // 'slug'=> 'kreslo',    
            ], 
            [
                'title' => 'Прикроватный столик',
                // 'slug'=> 'prikrovatnyy-stolik',    
            ],
            [
                'title' => 'Круглый стол',
                // 'slug'=> 'kruglyy-stol',    
            ],
            [
                'title' => 'Детский стульчик',
                // 'slug'=> 'detskiy-stulchik',    
            ],
            [
                'title' => 'Детский столик',
                // 'slug'=> 'detskiy-stolik',    
            ],
            [
                'title' => 'Ковер',
                // 'slug'=> 'kover',    
            ],
            [
                'title' => 'Подставка для Алисы',
                // 'slug'=> 'podstavka-dlya-alisy',    
            ],
        ];


        foreach($models as $model){
            Model::updateOrCreate(
                array_merge($model, ['warranty' => 24])
            );
        }
    }
}
