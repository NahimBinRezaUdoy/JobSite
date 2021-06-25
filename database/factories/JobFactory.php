<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\Job;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use illuminate\Support\Str;

class JobFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Job::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'company_id' => Company::all()->random()->id,
            'title' => $name = $this->faker->text,
            'slug' => Str::slug($name),
            'roles' => $this->faker->text,
            'description' => $this->faker->paragraph(rand(2, 10)),
            'category_id' => rand(0, 1),
            'position' => $this->faker->jobTitle,
            'status' => rand(0, 1),
            'type' => 'Full Time',
            'last_date' => $this->faker->DateTime,
            'address' => $this->faker->address,
        ];
    }
}
