<?php

namespace Database\Seeders;

use App\Models\Jiri;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class JiriSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Jiri::factory(10)->create();
    }
}
