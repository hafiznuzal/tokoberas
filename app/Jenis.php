<?php

namespace App;
use App\KursBarang as Kurs;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Jenis extends Model
{
    use SoftDeletes;

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
    public static function createAndKurs($nama, $harga, $tanggal = null)
    {
        $jenis = new Jenis;
        $jenis->nama = $nama;
        $jenis->latest_kurs_id = 0;
        $jenis->save();

        $kurs = new Kurs;
        $kurs->harga = $harga;
        if ($tanggal == null) {
            $tanggal = date('Y-m-d H:i:s');
        }
        $kurs->tanggal = $tanggal;
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

    public function inventory()
    {
        return $this->hasMany('App\Inventory');
    }

    public function konsumen()
    {
        return $this->belongsToMany('App\Konsumen', 'barang_konsumens')
            ->withPivot('harga');
    }
}
