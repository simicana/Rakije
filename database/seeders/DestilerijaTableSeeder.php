<?php

namespace Database\Seeders;

use App\Models\Destilerija;
use Illuminate\Database\Seeder;

class DestilerijaTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Destilerija::create([
            'destilerija' => 'Tok'
        ]);

        Destilerija::create([
            'destilerija' => 'Hubert 1924'
        ]);

        Destilerija::create([
            'destilerija' => 'Aleksić'
        ]);

        Destilerija::create([
            'destilerija' => 'Kijamet'
        ]);

    }
}
