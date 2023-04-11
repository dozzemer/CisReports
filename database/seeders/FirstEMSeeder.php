<?php

namespace Database\Seeders;

use Carbon\Carbon;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;

class FirstEMSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('einsatzmittels')->insert([
            'cis_row_id' => Str::uuid(),
            'fmsname' => '11-46',
            'name' => 'LF 20',
            'order' => 1,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('einsatzmittels')->insert([
            'cis_row_id' => Str::uuid(),
            'fmsname' => '11-48',
            'name' => 'TSF-W',
            'order' => 2,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);

        DB::table('einsatzmittels')->insert([
            'cis_row_id' => Str::uuid(),
            'fmsname' => '11-19',
            'name' => 'MTF',
            'order' => 3,
            'created_at' => Carbon::now(),
            'updated_at' => Carbon::now()
        ]);
    }
}
