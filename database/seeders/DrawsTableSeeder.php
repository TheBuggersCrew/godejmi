<?php

namespace Database\Seeders;

use App\Models\Draw;
use Illuminate\Database\Seeder;

class DrawsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Draw::factory()->times(100)->create();
    }
}
