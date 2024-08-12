<?php

namespace App\Http\Controllers;

use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class UserController extends Controller
{
  public function save(Request $request)
  {
    $request->validate([
      'nama_lengkap' => 'required|string|max:255',
      'no_peserta'   => 'required|string|max:255|unique:users,no_peserta',
      'nisn'         => 'required|string|max:255|unique:users,nisn',
    ]);

    // Menyimpan data ke dalam tabel users menggunakan sintaks Eloquent
    User::create([
      'name'       => $request['nama_lengkap'],
      'no_peserta' => $request['no_peserta'],
      'nisn'       => $request['nisn'],
      'email'      => $request['nisn'].'@mail.com',
      'role'       => 90,
      'password'   => Hash::make($request['nisn']),
      'status'     => 1
    ]);

    return redirect()->back()->with('success', 'Data berhasil disimpan');
  }

  public function update(User $users, Request $request, $id)
  {
    $request->validate([
      'nama_lengkap' => 'required|string|max:255',
      'no_peserta'   => 'required|string|max:255|unique:users,no_peserta,' . $id . '',
      'nisn'         => 'required|string|max:255|unique:users,nisn,' . $id . '',
    ]);

    $user = $users->find($id);

    if (isset($request->password)) {
      $password = Hash::make($request['nisn']);
    } else {
      $password = $user->password;
    }

    User::where('id', $id)->update([
      'name'       => $request['nama_lengkap'],
      'no_peserta' => $request['no_peserta'],
      'nisn'       => $request['nisn'],
      'email'      => $request['nisn'].'@mail.com',
      'role'       => 90,
      'password'   => $password,
      'status'     => 1
    ]);

    return redirect()->back()->with('success', 'Data berhasil disimpan');
  }

  public function delete(User $users, $id)
  {
    $user = $users->find($id);

    $user->delete();
    return redirect()->back()->with('success', 'Data berhasil dihapus');
  }

}
