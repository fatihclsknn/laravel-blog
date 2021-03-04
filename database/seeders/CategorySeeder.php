<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories =['Yasam','Futbol','Gezi','Bilisim','Yemek'];
        foreach ($categories as $category){
            \DB::table('categories')->insert([
                'title'=>$category,
                'slug'=>\Str::slug($category),

            ]);

        }
    }
}
