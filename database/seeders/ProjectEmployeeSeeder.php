<?php

namespace Database\Seeders;

use App\Models\Employee;
use App\Models\Project;
use Illuminate\Database\Seeder;

class ProjectEmployeeSeeder extends Seeder
{
    public function run()
    {
        $projects = Project::all();

        foreach ($projects as $project) {

            $selectedEmployeeIds = [1,2,3];

            $employees = Employee::whereIn('id', $selectedEmployeeIds)->get();

            foreach ($employees as $employee) {
                $project->employees()->attach($employee->id);
            }
        }
    }
}
