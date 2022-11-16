<?php

namespace Modules\Category\Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use Modules\Category\Entities\Category;

class CategoryDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $categories = [
            [
                'name' => 'UI/UX Design',
                'slug' => 'ui-ux-design',
                'icon' => 'fas fa-male',
                'thumbnail' => 'backend/image/default.png',
                'created_at' => now(),
            ],
            [
                'name' => 'Graphics Design',
                'slug' => 'graphics-design',
                'icon' => 'fas fa-pencil-alt',
                'thumbnail' => 'backend/image/default.png',
                'created_at' => now(),
            ],
            [
                'name' => 'Web Design',
                'slug' => 'web-design',
                'icon' => 'fas fa-pencil-alt',
                'thumbnail' => 'backend/image/default.png',
                'created_at' => now(),
            ],
            [
                'name' => 'Web Development',
                'slug' => 'web-development',
                'icon' => 'fas fa-code',
                'thumbnail' => 'backend/image/default.png',
                'created_at' => now(),
            ],
            [
                'name' => '3D Animation',
                'slug' => '3d-animation',
                'icon' => 'fas fa-cube',
                'thumbnail' => 'backend/image/default.png',
                'created_at' => now(),
            ]
        ];

        Category::insert($categories);

        // Model::unguard();
        // factory(Category::class, 10)->create();

    }
}
