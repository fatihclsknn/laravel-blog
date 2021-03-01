<?php

namespace Database\Seeders;

use App\Models\Article;
use Faker;
use Illuminate\Database\Seeder;
use Illuminate\Support\Str;

class ArticleSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run(Faker\Generator $faker)
    {
        for ($i=0;$i<10;$i++){
            $title = $faker->sentence(2);
            $article =Article::create([
                'title'=>Str::title($title),
                'slug'=>Str::slug($title),
                'content'=>$faker->paragraph('4'),
            ]);


        }
    }
}
