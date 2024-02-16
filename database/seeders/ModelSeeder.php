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
                'title' => 'Стул - миндаль',
            ], 
            [
                'title' => 'Полукресло - сакура',   
            ], 
            [
                'title' => 'Кресло - приц',   
            ], 
            [
                'title' => 'Прикроватный столик - кайзен ',    
            ],
            [
                'title' => 'Стол круглый - белое солнце',    
            ],
            [
                'title' => 'Детский стульчик - ракета',   
            ],
            [
                'title' => 'Детский столик - космос',   
            ]
        ];


        foreach($models as $model){
            Model::updateOrCreate(
                array_merge($model, ['warranty' => 24])
            );
        }
    }
}
