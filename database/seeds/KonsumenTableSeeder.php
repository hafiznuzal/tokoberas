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
            'nama' => 'Gugik Restoran',
            'alamat'        => 'Jl Blimbing',
            'nama_cp'       => 'Adek Gugik',
            'telepon_cp'    => '08182312371',
            'telepon_restoran' => '08182312371',
        ]);
        Konsumen::create([
            'nama' => 'Hendro Restoran',
            'alamat'        => 'Jl Amerika',
            'nama_cp'       => 'Adek Hendro',
            'telepon_cp'    => '08182312371',
            'telepon_restoran' => '08182312371',
        ]);
    }
}
