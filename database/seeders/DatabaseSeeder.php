<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Seeder;
use \App\Models\User;
use \App\Models\Company;
use \App\Models\Job;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        User::factory(20)->create();
        Company::factory(20)->create();
        Job::factory(20)->create();

        $categories = [
            'Government', 'NGO', 'Banking', 'Software', 'Networking',
        ];

        foreach ($categories as $category) {
            Category::create(['name' => $category]);
        }
    }
}
