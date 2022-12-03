<?php

namespace Database\Seeders;

use App\Models\Products;
use App\Models\Units;
use Illuminate\Database\Seeder;
use SebastianBergmann\CodeCoverage\Report\Xml\Unit;

class ProductsSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $cola = Products::create([
            'name' => 'cola',
        ]);
        $liter = Units::find(1);
        $milliliters = Units::find(2);

        $cola->quantities()->attach($liter, ['quantity' => 1]);
        $cola->quantities()->attach($milliliters, ['quantity' => 500]);

    }
}
