<?php

namespace Database\Seeders;

use App\Models\Tasks;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        Tasks::factory()
            ->count(10)
            ->create();
    }
}
