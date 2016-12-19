<?php

namespace App;
use App\KursBarang as Kurs;

use Illuminate\Database\Eloquent\Model;

class Jenis extends Model
{
    protected $table = 'jenis';

    protected $guarded = [];

    /**
     * Bikin barang beserta kursnya
     *
     * @param String $nama
     * @param Number $harga
     *
     * @return App\Jenis
     */
    public static function createAndKurs($nama, $harga)
    {
        $jenis = new Jenis;
        $jenis->nama = $nama;
        $jenis->latest_kurs_id = 0;
        $jenis->save();

        $kurs = new Kurs;
        $kurs->harga = $harga;
        $kurs->tanggal = date('Y-m-d H:i:s');
        $kurs->jenis_id = $jenis->id;
        $kurs->save();

        $jenis->latest_kurs_id = $kurs->id;
        $jenis->save();

        return $jenis;
    }

    public function kurs()
    {
        return $this->hasMany('App\KursBarang');
    }

    public function latest_kurs()
    {
        return $this->belongsTo('App\KursBarang', 'latest_kurs_id');
    }
}
