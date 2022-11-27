<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CreateSettingsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('cis_config')->insert([
            'cis_config_key' => 'app_name',
            'cis_config_value' => 'Cis-Reports',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cis_config')->insert([
            'cis_config_key' => 'db_version',
            'cis_config_value' => config("app.version"),
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cis_config')->insert([
            'cis_config_key' => 'frontend_auth',
            'cis_config_value' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);

        DB::table('cis_config')->insert([
            'cis_config_key' => 'user_auth_method',
            'cis_config_value' => 'username',
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now(),
        ]);
    }
}
