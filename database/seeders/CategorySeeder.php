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
        "italian",
        "French",
        "Japanese",
        "Mexican",
        "Greek",
        "Thai",
        "German",
        "Vegan",
        "Fish",
        "Meat",
        "fast food",];

        foreach($categories as $category){
            $newCategory = new Category();

            $newCategory->name = $category;

            $newCategory->save();
        }
        
    }
}
