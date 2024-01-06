<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class Template extends Seeder
{
    public function run()
    {
        $template = [
            [
                'id' => 1,
                'name' => 'Night Wedding',
                'price' => 5000,
                'desc' => 'The night wedding template.',
                'image' => '1.jpg',
                'created_at' => now(),
            ],
            [
                'id' => 2,
                'name' => 'Simple Wedding',
                'price' => 0,
                'desc' => 'First template wedding by rare.in',
                'image' => '2.jpg',
                'created_at' => now(),
            ],
        ];

        DB::table('template')->insert($template);
    }
}
