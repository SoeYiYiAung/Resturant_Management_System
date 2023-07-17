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
        //
        $categories = [
            [
                'id'    => 1,
                'category_name' => 'Food',
            ],
            [
                'id'    => 2,
                'category_name' => 'Drink',
            ]
        ];

        Category::insert($categories);
    }
}
