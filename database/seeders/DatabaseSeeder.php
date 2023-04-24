<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Department;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\Department::factory(14)->create([
        //     'department_name' => 'Test User',
        // ]);
        $names = [
            'College of Allied Health Sciences', 
            'College of Arts and Letters', 
            'College of Human Kinetics', 
            'College of Business and Financial Science',
            'College of Continuing, Advanced and Professional Studies',
            'College of Computing and Information Sciences',
            'College of Construction Sciences and Engineering',
            'College of Education',
            'College of Governance and Public Policy',
            'College of Maritime Leadership Innovation',
            'College of Sciences',
            'College of Technology Management',
            'Center of Tourism and Hospitality Management',
            'Higher School ng Umak',
         ];

    foreach($names as $name) {
        Department::factory()->create([
                'department_name' => $name,
            ]);
    }

        Department::factory()->create();

        // $this->call(CandidateSeeder::class);
        // $this->call(RoleSeeder::class);
        // $this->call(AdminSeeder::class);
    }
}
