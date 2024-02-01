<?php

namespace Database\Factories;

use App\Helpers;
use App\Models\Department;
use App\Models\District;
use App\Models\Position;
use App\Models\Province;
use App\Models\Ward;
use App\Traits\EmployeeCode;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Facades\Hash;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Model>
 */
class EmployeeFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            "code_employee" => Helpers::generateCode('MNV'),
            "full_name" => fake()->name(),
            "gender" => fake()->boolean(),
            "status" => fake()->boolean(),
            "email" => fake()->safeEmail(),
            'password' => Hash::make('password'),
            "image" => fake()->imageUrl(),
            "phone_number" => fake()->numerify('##########'),
            "basic_salary" => fake()->numberBetween(100000, 50000000),
            "identify_number" => fake()->numerify('############'),
            "dob" => fake()->date("Y-m-d"),
            "province_id" => fake()->randomElement(Province::select("id")->get()),
            "district_id" => fake()->randomElement(District::select("id")->get()),
            "ward_id" => fake()->randomElement(Ward::select("id")->get()),
            "position_id" => fake()->randomElement(Position::select("id")->get()),
            "department_id" => fake()->randomElement(Department::select("id")->get()),
            "degree" => fake()->randomElement(["THPT", "CAO ĐẲNG", "ĐẠI HỌC", "CAO HỌC"]),
            "major" => fake()->text(10),
            "created_at" => fake()->dateTimeBetween('2024-01-01', '2024-12-31'),
        ];
    }
}
