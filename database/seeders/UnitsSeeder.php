<?php

namespace Database\Seeders;

use App\Models\Units;
use Illuminate\Database\Seeder;

class UnitsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $liter = Units::create([
            'name' => 'liter',
            'value' => 1,
            'parent_id' => null,
        ]);

        $milliliters = Units::create([
            'name' => 'milliliters',
            'value' => 1000,
            'parent_id' => $liter->id,
        ]);




    }
}
