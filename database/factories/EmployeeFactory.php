<?php

namespace Database\Factories;

use App\Traits\EmployeeCode;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeFactory extends Factory
{
    use EmployeeCode;
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "code_employee" => $this->generateEmployeeCode("MNV"),
            "full_name" => fake()->name(),
            "gender" => fake()->boolean(),
            "status" => fake()->boolean(),
            "email" => fake()->safeEmail(),
            'password' => Hash::make('password'),
            "image" => fake()->imageUrl(),
            "phone_number" => fake()->phoneNumber(),
            "dob" => fake()->date(),
            'identify_number' => fake()->randomNumber(),
            "nationality" => fake()->country(),
            "position_id" => fake()->numberBetween(1, 5),
            "degree" => fake()->randomElement(["TRUNG HỌC", "CAO ĐẲNG", "ĐẠI HỌC", "THẠC SĨ", "TIẾN SĨ", "CAO HỌC"]),
            'remember_token' => fake()->sentence(),

        ];
    }
}
