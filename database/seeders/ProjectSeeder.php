<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class ProjectSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('projects')->insert([

            'image' => 'https://source.unsplash.com/random',
            'title' => Str::random(10),
            'description' => Str::random(10)
        ]);
    }
}
