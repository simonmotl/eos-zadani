<?php

namespace Database\Seeders;

use App\Models\MemberTag;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class MemberTagSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        MemberTag::create([
            'name' => 'Web Development',
        ]);
        MemberTag::create([
            'name' => 'Software Engineering',
        ]);
        MemberTag::create([
            'name' => 'Data Science',
        ]);
        MemberTag::create([
            'name' => 'Cybersecurity',
        ]);
        MemberTag::create([
            'name' => 'Mobile App Development',
        ]);
    }
}
