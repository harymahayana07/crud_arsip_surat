<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratKeluar extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table ="surat_keluar";
    protected $primaryKey = "id";
    protected $fillable = ["noSkeluar","tglKeluar","tujuan","file","jenisSurat_id"];

    public function jenisSurat(){
        return $this->belongsTo(jenisSurat::class, 'jenisSurat_id');
    }

}
