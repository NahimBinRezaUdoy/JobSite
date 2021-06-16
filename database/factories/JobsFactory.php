<?php

namespace Database\Factories;

use App\Models\Jobs;
use App\Models\User;
use App\Models\Company;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class JobsFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Jobs::class;

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
