<?php

namespace Database\Seeders;

use App\Models\Factory;
use Illuminate\Database\Seeder;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class FactorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $factories = [
            [
                'title' => 'Фабрика 1 Симферополь',   
            ], 
        ];


        foreach($factories as $factory){
            Factory::updateOrCreate($factory);
        }
    }
}
