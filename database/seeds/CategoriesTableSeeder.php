<?php

use Illuminate\Database\Seeder;

class CategoriesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        //factory(App\Category::class, 6)->create();
        DB::table('categories')->insert([
            'name' => 'Digital Marketing',
            'icon_path' => '/images/digital_marketing_icon.png',
            'color' => 'purple',
        ]);
        DB::table('categories')->insert([
            'name' => 'Graphics and Design',
            'icon_path' => '/images/graphics_and_design_icon.png',
            'color' => 'blue',
        ]);
        DB::table('categories')->insert([
            'name' => 'Tech and Development',
            'icon_path' => '/images/tech_and_development_icon.png',
            'color' => 'yellow',
        ]);
        DB::table('categories')->insert([
            'name' => 'Writing and Translation',
            'icon_path' => '/images/writing_and_translation_icon.png',
            'color' => 'red',
        ]);
        DB::table('categories')->insert([
            'name' => 'Data Analysis',
            'icon_path' => '/images/data_analysis_icon.png',
            'color' => 'green',
        ]);
    }
}
