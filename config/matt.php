<?php
return [
  'nama_app'  => 'Pendaftaran Seleksi Mandiri Tahap 3',
  'deskripsi' => 'Pendaftaran ini mengumpulkan informasi penting mengenai calon mahasiswa untuk proses seleksi dan penerimaan mahasiswa baru pada prodi akuakultur',
  'logo'      => 'ubt.png',
  'logologin' => 'ubt.webp',
  'icon'      => 'favicon.ico',
  'wa'        => 'https://wa.me/628115307023',
  'ukuran'    => '5024',
  'role'      => [
    '10' => 'Super Admin',
    '20' => 'Admin',
    '30' => 'Verifikator',
    '90' => 'Calon Mahasiswa'
  ],
  'tahap' => [
    '1' => 'Verifikasi Email',
    '2' => 'Tahap 1 Pengisian Biodata Mahasiswa',
    '3' => 'Tahap 2 Isi Survei, Pemberkasan, Validasi Bebas Lab',
    '4' => 'Tahap 3 Validasi Keuangan & Pilih Periode Wisuda',
    '5' => 'Print Bukti Pendaftaran',
  ],
  'status' => [
    '0' => 'Tolak Peserta',
    '1' => 'Belum Mendaftar',
    '2' => 'Proses Verifikasi',
    '3' => 'Perbaikan',
    '4' => 'Sudah Valid',
  ],
];
