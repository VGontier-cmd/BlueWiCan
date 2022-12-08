<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Str;
use Carbon\Carbon;

class CanDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('can_datas')->insert([
            'id' => Str::random(10),
            'data' => Str::random(20),
            'length' => 10,
	    'created_at' => Carbon::now()->format('Y-m-d H:i:s'),
	    'updated_at' => Carbon::now()->format('Y-m-d H:i:s')
        ]);
    }
}
