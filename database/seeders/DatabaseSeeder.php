<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use App\Models\FederalEntity;
use App\Models\Municipality;
use App\Models\Settlement;
use App\Models\Zipcode;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     */
    public function run(): void
    {
        Zipcode::unguard();
        $path = 'database/scripts/zipcodes.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Zipcodes table seeded!');

        FederalEntity::unguard();
        $path = 'database/scripts/federal_entities.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Federal entities table seeded!');

        Municipality::unguard();
        $path = 'database/scripts/municipalities.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Municipalities table seeded!');

        Settlement::unguard();
        $path = 'database/scripts/settlements.sql';
        DB::unprepared(file_get_contents($path));
        $this->command->info('Settlements table seeded!');

        $this->command->info('Finished process seeding');
    }
}
