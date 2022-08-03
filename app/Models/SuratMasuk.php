<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SuratMasuk extends Model
{
    use HasFactory;

    public $timestamps = false;
    protected $table = "surat_masuk";
    protected $primaryKey = "id";
    protected $fillable = ["noSmasuk","tglMasuk","tglTerima","pengirim","no_agenda","disposisi","perihal","file","jenisSurat_id"];
    //protected $fillable = ["noSmasuk","pengirim","file","jenisSurat_id"];

    public function jenisSurat(){
        return $this->belongsTo(jenisSurat::class, 'jenisSurat_id');
    }
}
