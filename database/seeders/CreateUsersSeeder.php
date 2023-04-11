<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class CreateUsersSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            'cis_row_id' => Str::uuid(),
            'firstname' => 'Admin',
            'lastname' => 'Istrator',
            'username' => 'admin',
            'password' => Hash::make('password'),
            'backend_access' => true,
            'email' => 'admin@istrator.de',
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('users')->insert([
            'cis_row_id' => Str::uuid(),
            'firstname' => 'Group',
            'lastname' => 'User',
            'username' => 'group',
            'password' => Hash::make('group'),
            'backend_access' => false,
            'email' => 'group@group.de',
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
            'group_user' => 1,
        ]);

        DB::table('users')->insert([
            'cis_row_id' => Str::uuid(),
            'firstname' => 'Maxima',
            'lastname' => 'Mustermann',
            'username' => 'maxima.mustermann',
            'password' => Hash::make('password'),
            'backend_access' => false,
            'email' => 'maxima@mustermann.de',
            'email_verified_at' => Carbon::now(),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
