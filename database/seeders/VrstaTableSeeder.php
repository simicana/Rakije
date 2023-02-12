<?php

namespace Database\Seeders;

use App\Models\Vrsta;
use Illuminate\Database\Seeder;

class VrstaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Vrsta::create([
            'vrsta' => 'Rakija od šljive'
        ]);

        Vrsta::create([
            'vrsta' => 'Rakija od dunje'
        ]);
        
        Vrsta::create([
            'vrsta' => 'Rakija od kruške'
        ]);

        Vrsta::create([
            'vrsta' => 'Rakija od jabuke'
        ]);

    }
}
