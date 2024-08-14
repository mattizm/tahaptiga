<?php

namespace App\Http\Controllers;

use App\Models\Biodata;
use App\Models\User;
use Carbon\Carbon;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Rap2hpoutre\FastExcel\FastExcel;

class ProcessController extends Controller
{
  public function index(Request $request)
  {
    $mhs = User::find(Auth::id());

    if ($mhs->role < 90) {
      $user  = User::all();
      $satu  = $user->where('status', 1)->count();
      $dua   = $user->where('status', 2)->count();
      $tiga  = $user->where('status', 3)->count();
      $empat = $user->where('status', 4)->count();
      return view('dashboard', compact('satu', 'dua', 'tiga', 'empat'));
    } else {
      if (Carbon::parse('2024-08-16 23:50:00')->lt(Carbon::now())) {
        return view('countdown');
      } else{
        return view('mahasiswa.mahasiswa', compact('mhs'));
      }
    }
  }

  public function caritahap3()
  {
    return view('auth.caritahap3');
  }

  public function createtahap3(Request $request) {
    $request->validate([
      'nisn' => 'required|numeric|digits_between:8,12',
    ]);

    $nisn = $request->nisn;
    $mhs = User::where('nisn', $nisn)->first();

    return view('mahasiswa.tahap3', compact('mhs', 'nisn'));
  }

  public function storetahap3(Request $request, User $peserta)
  {
    $user = $request->nisn;
    $cek  = $peserta->where('nisn', $user)->first();
    
    if ($cek) {
      $request->validate([
        'name'                        => 'required',
        'nisn'                        => 'required|numeric|unique:users,nisn,' . $cek->id,
        'upload_sertifikat_utbk_snbt' => 'required|mimes:png,jpg,jpeg,pdf|max:' . config('matt.ukuran'),
        'upload_resi'                 => 'required|mimes:png,jpg,jpeg,pdf|max:' . config('matt.ukuran'),
      ]);
    } else {
      $request->validate([
        'name'                        => 'required',
        'nisn'                        => 'required|numeric|unique:users,nisn',
        'upload_sertifikat_utbk_snbt' => 'required|mimes:png,jpg,jpeg,pdf|max:' . config('matt.ukuran'),
        'upload_resi'                 => 'required|mimes:png,jpg,jpeg,pdf|max:' . config('matt.ukuran'),
      ]);
    }
    
    if ($request->hasFile('upload_sertifikat_utbk_snbt')) {
      $namakartu = $user . '.' . $request->upload_sertifikat_utbk_snbt->getClientOriginalExtension();
      $request->upload_sertifikat_utbk_snbt->move(public_path('upload_kartu'), $namakartu);
    }
    
    if ($request->hasFile('upload_resi')) {
      $namaresi = $user . '.' . $request->upload_resi->getClientOriginalExtension();
      $request->upload_resi->move(public_path('upload_resi'), $namaresi);
    }
    
    $name         = $request->name;
    $nisn         = $user;
    $email        = $user.'@mail.com';
    $password     = Hash::make('Mandiri@3ubt');
    $upload_kartu = $namakartu;
    $upload_resi  = $namaresi;
    $status       = 2;

    User::updateOrCreate(
      ['nisn' => $nisn, 'email' => $email],
      [
        'name'         => $name,
        'password'     => $password,
        'status'       => $status,
        'role'         => 90,
      ]
    );

    $user_id = User::where('email', $email)->first()->id;
    Biodata::updateOrCreate(
      ['user_id' => $user_id],
      [
        'upload_kartu' => $upload_kartu,
        'upload_resi'  => $upload_resi
      ]
    );

    return redirect()->route('caritahap3')->withSuccess('Berhasil menyimpan data pendaftar Mandiri Tahap 3');
  }

  public function update(Request $request)
  {
    $request->validate([
      'upload_kartu' => 'required|mimes:png,jpg,jpeg,pdf|max:' . config('matt.ukuran'),
      'upload_resi'  => 'required|mimes:png,jpg,jpeg,pdf|max:' . config('matt.ukuran'),
    ]);

    $user = User::findOrFail(Auth::id());

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
      ['user_id' => Auth::id()],
      [
        'upload_kartu' => $namakartu,
        'upload_resi'  => $namaresi
      ]
    );

    return redirect()->back()->withSuccess('Berhasil Upload Kartu Ujian dan Kartu Peserta');
  }

  public function import(Request $request)
  {
    $request->validate([
      'import' => 'required|mimes:xls,xlsx,csv'
    ]);

    (new FastExcel())->import($request->import, function ($line) {
      return User::create([
        'name'       => $line['name'],
        'password'   => Hash::make($line['nisn']),
        'email'      => $line['no_peserta'] . '@mail.com',
        'no_peserta' => $line['no_peserta'],
        'nisn'       => $line['nisn'],
        'nilai'      => $line['nilai'],
        'status'     => 1,
        'role'       => 90,
      ]);
    });

    return redirect()->back()->withSuccess('Berhasil Import Peserta');
  }

  public function ekspor(Request $request)
  {
    $status = $request->status;
    return (new FastExcel(User::leftJoin('biodatas', 'users.id', '=', 'biodatas.user_id')->where('status', $status)->select('name','nilai','no_peserta','nisn','upload_kartu','upload_resi')->get()))->download('peserta_valid_mandiri_II_'.now().'.xlsx');
  }
}
