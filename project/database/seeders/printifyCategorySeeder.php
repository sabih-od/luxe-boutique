<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;

class printifyCategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Category::create([
            'id' => 1,
            'name' => 'Printify',
            'slug' => 'printify',
            'status' => 1,
            'language_id' => 1
        ]);
    }
}
