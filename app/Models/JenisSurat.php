<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class JenisSurat extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "jenis_surat";
    protected $primaryKey = "id";
    protected $fillable = ["kodeSurat","keterangan"];

    public function suratMasuk(){
        return $this->hasMany(SuratMasuk::class, 'jenisSurat_id');
    }
}
