<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Activity;
use App\Models\ActivityStatus;
use App\Models\Department;
use App\Models\Division;
use App\Models\User;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
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
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        DB::table('users')->insert([
            'name' => 'Sri Utami',
            'email' => 'utami@gmail.com',
            'role_id' => 2,
            'email_verified_at' => now(),
            'password' => Hash::make('password'),
            'remember_token' => Str::random(10),
            'created_at' => now(),
            'updated_at' => now(),
        ]);

        User::factory(5)->create();
        DB::table('activity_statuses')->insert([
            [
                'name' => 'Belum Dikerjakan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Sudah Dikerjakan',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        Activity::factory(100)->create();
        DB::table('roles')->insert([
            [
                'name' => 'SuperAdmin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'Admin',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'PJ',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('departments')->insert([
            [
                'name' => 'PE',
                'head_name' => 'Harsono',
                'budget' => 9000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'SP',
                'head_name' => 'Lilik TM',
                'budget' => 8000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'KSPHP',
                'head_name' => 'Elita',
                'budget' => 7000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'name' => 'TU',
                'head_name' => 'Suphendi',
                'budget' => 6000000,
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
        DB::table('divisions')->insert([
            [
                'department_id' => 1,
                'name' => 'Program',
                'head_name' => 'Fero',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 1,
                'name' => 'Evaluasi',
                'head_name' => 'Utami',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 2,
                'name' => 'Standardisasi',
                'head_name' => 'Yusi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 2,
                'name' => 'Pengujian',
                'head_name' => 'Rudi',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 3,
                'name' => 'Kerjasama',
                'head_name' => 'Armadu',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 3,
                'name' => 'PHP',
                'head_name' => 'Tri S',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 4,
                'name' => 'Rumah Tangga dan Perlengkapan',
                'head_name' => 'Yuni',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 4,
                'name' => 'Kepegawaian',
                'head_name' => 'Kartini',
                'created_at' => now(),
                'updated_at' => now(),
            ],
            [
                'department_id' => 4,
                'name' => 'Keuangan',
                'head_name' => 'Sigid TW',
                'created_at' => now(),
                'updated_at' => now(),
            ],
        ]);
    }
}
