<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $categories  = [
        "italiano",
        "francese",
        "giapponese",
        "messicano",
        "greco",
        "thailandese",
        "tedesco",
        "vegano",
        "pesce",
        "carne",
        "fast food",];

        foreach($categories as $category){
            $newCategory = new Category();

            $newCategory->name = $category;

            $newCategory->save();
        }
        
    }
}
