<?php

namespace Database\Seeders;

use App\Models\CourseEnroll;
use App\Models\Instructor;
use App\Models\Speaker;
use App\Models\User;
use Illuminate\Database\Seeder;
use Modules\Category\Database\Seeders\CategoryDatabaseSeeder;
use Modules\Category\Entities\Category;
use Modules\Course\Database\Seeders\CourseDatabaseSeeder;
use Modules\Course\Entities\Chapter;
use Modules\Course\Entities\Course;
use Modules\Course\Entities\Lesson;
use Modules\Event\Entities\Event;
use Modules\Review\Entities\Review;
use Modules\Setting\Entities\Setting;
use Modules\Student\Entities\Student;
use Modules\Testimonial\Database\Seeders\TestimonialDatabaseSeeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // $this->call(RolePermissionSeeder::class);
        $this->call([
            RolePermissionSeeder::class, // Role Permission
            UserSeeder::class,
            WebsiteSettingSeeder::class,
            ThemeSeeder::class,
            CategoryDatabaseSeeder::class,
            TestimonialDatabaseSeeder::class,
            // CourseDatabaseSeeder::class,
        ]);

        // Category::factory(5)->create();

        // CourseEnroll::factory(20)->create();
        // Review::factory(500)->create();
        // Event::factory(50)->create();
        // Chapter::factory(10)->create();
        // Lesson::factory(300)->create();
    }
}
