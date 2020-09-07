<?php

use Illuminate\Database\Seeder;
use App\Category;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
        	'name' => 'Eg One',
        	'photo' => 'images/one.jpg'
        ]);
        Category::create([
        	'name' => 'Eg Tow',
        	'photo' => 'images/two.jpg'
        ]);
        Category::create([
        	'name' => 'Eg Three',
        	'photo' => 'images/three.jpg'
        ]);
        Category::create([
        	'name' => 'Eg Four',
        	'photo' => 'images/four.jpg'
        ]);
    }
}
