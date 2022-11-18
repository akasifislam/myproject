<?php

namespace Database\Seeders;

use Carbon\Carbon;
use App\Models\User;
use App\Models\Admin;
use App\Models\Instructor;
use Illuminate\Support\Str;
use Illuminate\Database\Seeder;
use Modules\Student\Entities\Student;

class UserSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        // admin create
        $admin = new Admin();
        $admin->firstname = "I'm";
        $admin->lastname = "Admin";
        $admin->slug = "admin";
        $admin->email = "admin@mail.com";
        $admin->image = "backend/image/default.png";
        $admin->password = bcrypt('password');
        $admin->phone = '123456789';
        $admin->about = 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Perferendis, modi';
        $admin->address = 'Dhaka, Bangladesh';
        $admin->email_verified_at = Carbon::now();
        $admin->remember_token = Str::random(10);
        $admin->save();

        // students create
        $students = [
            [
                'firstname' => 'Student1',
                'lastname' => '1',
                'slug' => 'student1',
                'email' => 'student@mail.com',
                'image' => 'backend/image/default.png',
                'password' => bcrypt('password'),
                'phone' => '123456789',
                'nationality' => 'Bangladeshi',
                'profession' => 'Student',
                'about' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
                'created_at' => now(),
            ],
            [
                'firstname' => 'Student2',
                'lastname' => '2',
                'slug' => 'student2',
                'email' => 'student2@mail.com',
                'image' => 'backend/image/default.png',
                'password' => bcrypt('password'),
                'phone' => '123456789',
                'nationality' => 'Bangladeshi',
                'profession' => 'Student',
                'about' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
                'created_at' => now(),
            ],
            [
                'firstname' => 'Student3',
                'lastname' => '3',
                'slug' => 'student3',
                'email' => 'student3@mail.com',
                'image' => 'backend/image/default.png',
                'password' => bcrypt('password'),
                'phone' => '123456789',
                'nationality' => 'Bangladeshi',
                'profession' => 'Student',
                'about' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
                'created_at' => now(),
            ],
            [
                'firstname' => 'Student4',
                'lastname' => '4',
                'slug' => 'student4',
                'email' => 'student4@mail.com',
                'image' => 'backend/image/default.png',
                'password' => bcrypt('password'),
                'phone' => '123456789',
                'nationality' => 'Bangladeshi',
                'profession' => 'Student',
                'about' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
                'created_at' => now(),
            ],
            [
                'firstname' => 'Student5',
                'lastname' => '5',
                'slug' => 'student5',
                'email' => 'student5@mail.com',
                'image' => 'backend/image/default.png',
                'password' => bcrypt('password'),
                'phone' => '123456789',
                'nationality' => 'Bangladeshi',
                'profession' => 'Student',
                'about' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
                'created_at' => now(),
            ]
        ];

        // instructor create
        $instructors = [
            [
                'firstname' => 'Instructor',
                'lastname' => '1',
                'slug' => 'instructor',
                'email' => 'instructor@mail.com',
                'image' => 'backend/image/default.png',
                'password' => bcrypt('password'),
                'phone' => '123456789',
                'profession' => 'Teacher',
                'address' => 'Dhaka, Bangladesh',
                'about' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
                'created_at' => now(),
            ],
            [
                'firstname' => 'instructor',
                'lastname' => '2',
                'slug' => 'instructor2',
                'email' => 'instructor2@mail.com',
                'image' => 'backend/image/default.png',
                'password' => bcrypt('password'),
                'phone' => '123456789',
                'profession' => 'instructor',
                'address' => 'Dhaka, Bangladesh',
                'about' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
                'created_at' => now(),
            ],
            [
                'firstname' => 'Instructor',
                'lastname' => '3',
                'slug' => 'instructor3',
                'email' => 'instructor3@mail.com',
                'image' => 'backend/image/default.png',
                'password' => bcrypt('password'),
                'phone' => '123456789',
                'profession' => 'Teacher',
                'address' => 'Dhaka, Bangladesh',
                'about' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
                'created_at' => now(),
            ],
            [
                'firstname' => 'Instructor',
                'lastname' => '4',
                'slug' => 'instructor4',
                'email' => 'instructor4@mail.com',
                'image' => 'backend/image/default.png',
                'password' => bcrypt('password'),
                'phone' => '123456789',
                'profession' => 'Teacher',
                'address' => 'Dhaka, Bangladesh',
                'about' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
                'created_at' => now(),
            ],
            [
                'firstname' => 'Instructor',
                'lastname' => '5',
                'slug' => 'instructor5',
                'email' => 'instructor5@mail.com',
                'image' => 'backend/image/default.png',
                'password' => bcrypt('password'),
                'phone' => '123456789',
                'profession' => 'Teacher',
                'address' => 'Dhaka, Bangladesh',
                'about' => 'Lorem Ipsum is simply dummy text of the printing and typesetting industry. Lorem Ipsum has been the industrys standard dummy text ever since the 1500s',
                'created_at' => now(),
            ],
        ];

        Instructor::insert($instructors);
        User::insert($students);
    }
}
