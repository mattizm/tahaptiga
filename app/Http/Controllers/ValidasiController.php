<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\User;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class ValidasiController extends Controller
{
  public function index(Request $request, $status)
  {
    $cari   = $request->cari;
    $status = $status ?? null;
    $users  = User::where('status', $status)->where('role', 90)->when($cari, function($query, $cari){
      return $query->where('name', 'like', '%'.$cari.'%')->orWhere('no_peserta', 'like', '%'.$cari.'%');
    })->orderBy('id','desc')->paginate();
    $count = User::where('status', $status)->where('role', 90)->when($cari, function($query, $cari){
      return $query->where('name', 'like', '%'.$cari.'%')->orWhere('no_peserta', 'like', '%'.$cari.'%');
    })->count();
    return view('validasi.proses', compact('users','status','count'));
  }

  public function update(Request $request, $id)
  {
    $user = User::findOrFail($id);
    $user->status     = $request->status;
    $user->validator  = Auth::id();
    $user->update();
    
    Biodata::updateOrCreate(['user_id' => $id],['keterangan' => $request->keterangan]);

    return redirect()->back()->withSuccess('Data berhasil diperbaharui');

  }

  public function editdata($id)
  {
    $mhs = User::find($id);
    return view('validasi.mahasiswa', compact('mhs'));
  }

  public function storedata(Request $request,$id)
  {
    $request->validate([
      'upload_kartu' => 'required|mimes:png,jpg,jpeg,pdf|max:' . config('matt.ukuran'),
      'upload_resi'  => 'required|mimes:png,jpg,jpeg,pdf|max:' . config('matt.ukuran'),
    ]);

    $user = User::findOrFail($id);

    if ($request->hasFile('upload_kartu')) {
      $namakartu = $user->no_peserta . '.' . $request->upload_kartu->getClientOriginalExtension();
      $request->upload_kartu->move(public_path('upload_kartu'), $namakartu);
    }

    if ($request->hasFile('upload_resi')) {
      $namaresi = $user->no_peserta . '.' . $request->upload_resi->getClientOriginalExtension();
      $request->upload_resi->move(public_path('upload_resi'), $namaresi);
    }

    $user->status       = 2;
    $user->update();

    Biodata::updateOrCreate(
      ['user_id' => $id],
      [
        'upload_kartu' => $namakartu,
        'upload_resi'  => $namaresi
      ]
    );
    return redirect()->route('validasi.index',3)->withSuccess('Berhasil Memperbaharui Kartu Ujian dan Kartu Peserta');
  }
}
