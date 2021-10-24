<?php

namespace Database\Seeders;
use App\Models\Category;
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
        Category::create([
            'name' => 'Undangan' 
        ]);
        Category::create([
            'name' => 'Pengumuman' 
        ]);
        Category::create([
            'name' => 'Nota Dinas' 
        ]);
        Category::create([
            'name' => 'Pemberitahuan' 
        ]);
      
    }
}
