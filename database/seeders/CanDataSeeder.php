<?php

namespace Database\Seeders;

use App\Models\CanData;
use Illuminate\Database\Seeder;

class CanDataSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        CanData::factory()->count(200)->create();
    }
}
