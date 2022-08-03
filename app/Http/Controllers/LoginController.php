<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Crypt;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\File;

class LoginController extends Controller
{
    //Proses login
    public function login(Request $a)
    {
        //Validasi
        $messages = [
            'email.required' => 'Email tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
        ];
        $cekValidasi = $a->validate([
            //'email' => 'required|email:dns|unique:users',
            'email' => 'required',
            'password' => 'required|max:50'
        ], $messages);

        if (Auth::attempt($cekValidasi)) {
            $a->session()->regenerate();
            return redirect('surat')->with('toast_success', 'Selamat Datang di App Surat!');
        }
        return back()->with('toast_error', 'Anda tidak bisa login!');
        /*
        if (Auth::attempt($cek)) {
            $a->session()->regenerate();
            return redirect()->intended('/surat');
        }*/
    }

    //logout
    public function logout(Request $a)
    {
        Auth::logout();
        $a->session()->invalidate();
        $a->session()->regenerateToken();
        return redirect('view-login');
    }

    /*
    * DATA USER
    */
    //View Login
    public function viewLogin()
    {
        return view("login");
    }
    /*view data user */
    public function viewUser()
    {
        $dataUsr = User::all();
        return view("user.view-user", ['data' => $dataUsr]);
    }
    //input data user
    public function inputUser()
    {
        return view("user.input-user");
    }
    public function saveUser(Request $x)
    {
        //Validasi
        $messages = [
            'name.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'level.required' => 'level user tidak boleh kosong!',
            'jabatan.required' => 'jabatan tidak boleh kosong!',
            'password.required' => 'Password tidak boleh kosong!',
            'image' => 'File harus berupa tipe: jpeg,png,jpg|max:2048'
        ];
        $cekValidasi = $x->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'jabatan' => 'required',
            'password' => 'required|min:4|max:100',
            'file' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ], $messages);

        //$cekValidasi['password'] = Hash::make($cekValidasi['password']);

        $file = $x->file('file');
        if (empty($file)) {
            User::create([
                'name' => $x->name,
                'email' => $x->email,
                'password' => bcrypt($x['password']),
                'level' => $x->level,
                'jabatan' => $x->jabatan,
            ]);
        } else {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $ekstensi = $file->getClientOriginalExtension();
            $ukuran = $file->getSize();
            $patAsli = $file->getRealPath();
            $namaFolder = 'file';
            $file->move($namaFolder, $nama_file);
            $pathPublic = $namaFolder . "/" . $nama_file;

            User::create([
                'name' => $x->name,
                'email' => $x->email,
                'password' => bcrypt($x['password']),
                'level' => $x->level,
                'jabatan' => $x->jabatan,
                'file' => $pathPublic,
            ]);
        }
        return redirect('/view-user')->with('toast_success', 'Data berhasil tambah!');
    }

    //edit data user
    public function editUser($idUser)
    {
        $dataUser = User::find($idUser);
        return view("user.edit-user", ['data' => $dataUser]);
    }

    public function updateUser($idUser, Request $x)
    {
        //Validasi
        $messages = [
            'name.required' => 'Nama tidak boleh kosong!',
            'email.required' => 'Email tidak boleh kosong!',
            'level.required' => 'level user tidak boleh kosong!',
            'jabatan.required' => 'jabatan tidak boleh kosong!',
            'image' => 'File harus berupa tipe: jpeg,png,jpg|max:2048'
        ];
        $cekValidasi = $x->validate([
            'name' => 'required',
            'email' => 'required',
            'level' => 'required',
            'jabatan' => 'required',
            'file' => 'file|image|mimes:jpeg,png,jpg|max:2048',
        ], $messages);

        $file = $x->file('file');
        if (file_exists($file)) {
            $nama_file = time() . "-" . $file->getClientOriginalName();
            $folder = 'file';
            $file->move($folder, $nama_file);
            $path = $folder . "/" . $nama_file;
            //delete
            $data = User::where('id', $idUser)->first();
            File::delete($data->file);
        } else {
            $path = $x->pathFile;
        }
        User::where("id", "$idUser")->update([
            'name' => $x->name,
            'email' => $x->email,
            'level' => $x->level,
            'jabatan' => $x->jabatan,
            'file' => $path,
        ]);
        return redirect('/view-user')->with('toast_success', 'Data berhasil di update!');
    }


    //hapus surat masuk
    public function hapusUser($id)
    {
        try {
            $data = User::where('id', $id)->first();
            File::delete($data->file);
            User::where('id', $id)->delete();
            return redirect('/view-user')->with('toast_success', 'Data berhasil di hapus!');
        } catch (\Illuminate\Database\QueryException $e) {
            return redirect('/view-user')->with('toast_error', 'Data tidak bisa di hapus!');
        }
    }
}
