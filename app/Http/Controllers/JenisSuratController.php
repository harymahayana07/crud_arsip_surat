<?php

namespace App\Http\Controllers;

use App\Models\JenisSurat;
use Illuminate\Http\Request;
use App\Models\SuratMasuk;
use Illuminate\Support\Facades\File;
use Illuminate\Support\Facades\Storage;


class JenisSuratController extends Controller
{
    /*
    * JENIS SURAT
    */
    //view jenis surat
    public function viewJenis()
    {
        $dataJenis = JenisSurat::all();
        return view("jenis-surat.view-jenis", ['data' => $dataJenis]);
    }

    //tambah jenis surat
    public function inputJenis()
    {
        return view("jenis-surat.input-jenis");
    }
    public function saveJenis(Request $x)
    {
        //Validasi
        $messages = [
            'kodeSurat.required' => 'Kode Jenis Surat tidak boleh kosong!',
            'keterangan.required' => 'Keterangan tidak boleh kosong!',
        ];
        $cekValidasi = $x->validate([
            'kodeSurat' => 'required',
            'keterangan' => 'required',
        ], $messages);

        JenisSurat::create([
            'kodeSurat' => $x->kodeSurat,
            'keterangan' => $x->keterangan,
        ], $cekValidasi);
        return redirect('/view-jenis')->with('toast_success', 'Data berhasil tambah!');
    }

    //edit jenis surat
    public function editJenis($idJenis)
    {
        $dataJenis = JenisSurat::find($idJenis);
        return view("jenis-surat.edit-jenis", ['data' => $dataJenis]);
    }
    public function updateJenis($idJenis, Request $x)
    {
        //Validasi
        $messages = [
            'kodeSurat.required' => 'Kode Jenis Surat tidak boleh kosong!',
            'keterangan.required' => 'Keterangan tidak boleh kosong!',
        ];
        $cekValidasi = $x->validate([
            'kodeSurat' => 'required',
            'keterangan' => 'required',
        ], $messages);

        JenisSurat::where("id", "$idJenis")->update([
            'kodeSurat' => $x->kodeSurat,
            'keterangan' => $x->keterangan,
        ], $cekValidasi);
        return redirect('/view-jenis')->with('toast_success', 'Data berhasil di update!');
    }
    
    //Hapus jenis surat
    public function hapusJenis($id)
    {
        try {
            JenisSurat::where('id', $id)->delete();
            return redirect('/view-jenis')->with('toast_success', 'Data berhasil di hapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/view-jenis')->with('toast_error', 'Data tidak bisa di hapus!');
        }
    }
}
