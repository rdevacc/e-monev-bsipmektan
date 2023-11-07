<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Activity;
use App\Models\Department;
use App\Models\Division;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        // \App\Models\User::factory(2)->create();
        // \App\Models\User::factory(10)->create();

        DB::table('users')->insert([
            'name' => 'Rizky',
            'email' => 'rizky@gmail.com',
            'role_id' => 1,
            'email_verified_at' => now(),
            'password' => bcrypt('password'),
            'remember_token' => Str::random(10),
        ]);

        User::factory(2)->create();
        Activity::factory(3)->create();
        DB::table('roles')->insert([
            [
                'name' => 'SuperAdmin',
            ],
            [
                'name' => 'Admin',
            ],
            [
                'name' => 'PJ',
            ],
        ]);
        DB::table('departments')->insert([
            [
                'name' => 'PE',
                'head_name' => 'Harsono',
                'budget' => 9000000,
            ],
            [
                'name' => 'SP',
                'head_name' => 'Lilik TM',
                'budget' => 9000000,
            ],
            [
                'name' => 'KSPHP',
                'head_name' => 'Elita',
                'budget' => 9000000,
            ],
            [
                'name' => 'TU',
                'head_name' => 'Suphendi',
                'budget' => 9000000,
            ],
        ]);
        DB::table('divisions')->insert([
            [
                'department_id' => 1,
                'name' => 'Program',
                'head_name' => 'Fero',
            ],
            [
                'department_id' => 1,
                'name' => 'Evaluasi',
                'head_name' => 'Utami',
            ],
            [
                'department_id' => 2,
                'name' => 'Standardisasi',
                'head_name' => 'Yusi',
            ],
            [
                'department_id' => 2,
                'name' => 'Pengujian',
                'head_name' => 'Rudi',
            ],
            [
                'department_id' => 3,
                'name' => 'Kerjasama',
                'head_name' => 'Armadu',
            ],
            [
                'department_id' => 3,
                'name' => 'PHP',
                'head_name' => 'Tri S',
            ],
            [
                'department_id' => 4,
                'name' => 'Rumah Tangga dan Perlengkapan',
                'head_name' => 'Yuni',
            ],
            [
                'department_id' => 4,
                'name' => 'Kepegawaian',
                'head_name' => 'Kartini',
            ],
            [
                'department_id' => 4,
                'name' => 'Keuangan',
                'head_name' => 'Sigid TW',
            ],
        ]);
    }
}
