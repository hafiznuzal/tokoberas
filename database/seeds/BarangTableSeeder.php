<?php

use Illuminate\Database\Seeder;
use App\Jenis;

class BarangTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Jenis::createAndKurs('Beras Pandan Wangi', 20000);
        Jenis::createAndKurs('Beras Lokal', 10000);
        Jenis::createAndKurs('Beras Impor Jepang', 22500);
        Jenis::createAndKurs('Beras Wangi', 18000);
        Jenis::createAndKurs('Beras Wangi SDK', 18000);
    }
}
