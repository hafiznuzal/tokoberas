<?php

use Illuminate\Database\Seeder;
use App\Konsumen;

class KonsumenTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Konsumen::create([
            'nama'          => 'Gugik',
            'tanggallahir'  => '1993-07-29',
            'alamat'        => 'Jl Blimbing',
            'telepon'       => '08182312371',
            'hp'            => '0818238127272',
        ]);
        Konsumen::create([
            'nama'          => 'Hendro',
            'tanggallahir'  => '1993-08-29',
            'alamat'        => 'Jl Amerika',
            'telepon'       => '08182312371',
            'hp'            => '0818238127272',
        ]);
    }
}
