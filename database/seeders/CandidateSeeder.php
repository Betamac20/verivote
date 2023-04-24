<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Candidates;
class CandidateSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        $user = Candidates::create([
            'id_number' => 'K1143179',
            'name' => 'Mark Anthony Rodriguez',
            'department' => 'College of Computing and Information Sciences',
            'position' => 'President',
            'candidate_role' => 'student',
        ]);
    }
}
