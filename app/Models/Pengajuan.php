<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use DB;

class Pengajuan extends Model
{
    use HasFactory;
    protected $fillable = 
    [
        'kode_pengajuan',
        'barang_id',
        'qty',
        'perkiraan_biaya',
    ];
    public function barangmasuk()
    {
        return $this->hasMany(BarangMasuk::class,'pengajuan_id');
    }
    public function barang()
    {
        return $this->belongsTo(Barang::class, 'barang_id');
    }
    public static function kode()
    {
        $kode = DB::table('pengajuans')->max('kode_pengajuan');
        $addNol = '';
        $kode = str_replace("PGJN-BRG", "", $kode);
        $kode = (int) $kode + 1;
        $incrementKode = $kode;

        if (strlen($kode) == 1)
        {
            $addNol = "000";
        }
        else if (strlen($kode) == 2)
        {
            $addNol = "00";
        }
        else if (strlen($kode) == 3)
        {
            $addNol = "0";
        }

        $kodeBaru = "PGJN-BRG".$addNol.$incrementKode;
        return $kodeBaru;
    }
}
