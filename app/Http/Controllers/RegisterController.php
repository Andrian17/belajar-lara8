<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class RegisterController extends Controller
{
    public function index()
    {
        return view('register.indexRegister', [
            'title' => 'Registrasi'
        ]);
    }

    public function simpanRegister( Request $request )
    {
        //return $request->all();
        //membuat validasi
        $dataValid = $request->validate([
            'username' => 'required|unique:users',
            'name' => ['required', 'min:3', 'max:255'],
            'email' => ['required', 'unique:users', 'email:dns'],
            'password' => ['required', 'min:5']
        ]);

        //enkripsi password 
        //$dataValid['password'] = bycrypt($dataValid['password']);
        $dataValid['password'] = Hash::make($dataValid['password']);
        User::create($dataValid);

        //notif
        //$request->session()->flash('status', 'Registrasi berhasil! Login sekarang...');
        return redirect('/login')->with('status', 'Registrasi berhasil! Login sekarang');

    }

}
