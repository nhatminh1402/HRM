<?php

namespace Database\Factories;

use App\Models\Employee;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Foundation\Testing\WithFaker;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeFactory extends Factory
{
    protected $model = Employee::class;
    use WithFaker;
    
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'full_name' => $this->faker->name,
            'gender' => $this->faker->boolean,
            'image' => $this->faker->imageUrl,
            'nick_name' => $this->faker->optional()->firstName,
            'dob' => $this->faker->date,
            'birth_place' => $this->faker->optional()->city,
            'nationality' => $this->faker->optional()->country,
            'marriage_status' => $this->faker->boolean,
            'religion' => $this->faker->optional()->word,
            'nation' => $this->faker->optional()->word,
            'status' => $this->faker->optional()->boolean,
            'identify_number' => $this->faker->optional()->randomNumber,
            'card_issuance_date' => $this->faker->optional()->date,
            'place_of_card_issuance' => $this->faker->optional()->city,
            'id_postition' => $this->faker->optional()->randomDigit,
            'created_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
            'updated_at' => $this->faker->dateTimeBetween('-1 year', 'now'),
        ];
    }
}
