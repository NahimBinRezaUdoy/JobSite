<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\User;
use Illuminate\Support\Str;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Company::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'user_id' => User::all()->random()->id,
            'cname' => $title = $this->faker->company,
            'slug' => Str::slug($title),
            'address' => $this->faker->address,
            'phone' => '01724191079',
            'website' => $this->faker->domainName,
            'logo' => $this->faker->image('public/storage/logo', 640, 480, null, false),
            'cover_photo' => $this->faker->image('public/storage/cover_photo', 640, 480, null, false),
            'slogan' => $this->faker->sentence($nbWords = 5, $variableNbWords = true),
            'description' => $this->faker->paragraph(rand(2, 10)),

        ];
    }
}
