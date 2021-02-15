<?php

namespace Database\Seeders;

use App\Models\OperatingSystem;
use Illuminate\Database\Seeder;

class OperatingSystemSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        OperatingSystem::insert([
           ['name' => 'Automated'],
            ['name' => 'Belay'],
            ['name' => 'Personal Fall'],
            ['name' => 'Spotted'],
        ]);
    }
}
