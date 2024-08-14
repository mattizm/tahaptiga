@extends('layouts.master')
@section('title', 'Validasi Calon Mahasiswa')
@section('content')
  <div class="row">
    <div class="col-lg-6 col-sm-12">
      <button type="button" class="btn btn-primary" data-bs-toggle="modal" data-bs-target="#create_new">
        Tambah Pengguna
      </button>
      <button type="button" class="btn btn-light-primary" data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">
        <i class="ki-duotone ki-filter fs-2">
          <span class="path1"></span>
          <span class="path2"></span>
        </i>
        Cari Peserta
      </button>
      <!--begin::Menu 1-->
      <div class="menu menu-sub menu-sub-dropdown w-300px w-md-325px" data-kt-menu="true">
        <!--begin::Header-->
        <div class="px-7 py-5">
          <div class="fs-5 text-dark fw-bold">Cari Nama atau Nomor Peserta</div>
        </div>
        <!--end::Header-->
        <!--begin::Separator-->
        <div class="separator border-gray-200"></div>
        <!--end::Separator-->
        <!--begin::Content-->
        <form method="get" class="px-7 py-5" action="{{ route('validasi.index', $status) }}">
          <!--begin::Input group-->
          <div class="form-floating mb-10">
            <input value="{{ $cari ?? null }}" for="floatingInput" name="cari" type="text"
              class="form-control form-control-solid">
            <label id="floatingInput" class="form-label fs-6 fw-semibold">Cari Nama atau Nomor Peserta</label>
          </div>
          <!--end::Input group-->
          <!--begin::Actions-->
          <div class="d-flex justify-content-end">
            <button type="submit" class="btn btn-primary fw-semibold px-6">Cari</button>
          </div>
          <!--end::Actions-->
        </form>
        <!--end::Content-->
      </div>
      <!--end::Menu 1-->
    </div>
    <div class="col-lg-6 col-sm-12">
      <div class="d-flex justify-content-center">
        <form class="d-flex" action="{{ route('import') }}" method="post" enctype="multipart/form-data">@csrf
          <input type="file" name="import" class="form-control">
          <button class="btn btn-info" type="submit"
            onClick="this.form.submit(); this.disabled=true; this.innerText='Mohon Tunggu…'; ">Impor</button>
        </form>
        <form action="{{ route('ekspor') }}" method="post">@csrf
          <input hidden type="text" name="status" value="{{ $status }}">
          <button type="submit" class="btn btn-success ms-5">Ekspor</button>
        </form>
      </div>
    </div>
  </div>
  <div class="table-responsive">
    <!--begin::Table-->
    <table class="table align-middle table-row-dashed fs-6 gy-5" id="kt_table_users">
      <thead>
        <tr class="text-start text-muted fw-bold fs-7 text-uppercase gs-0">
          <th class="w-10px pe-2">
            <div class="form-check form-check-sm form-check-custom form-check-solid me-3">
              <input class="form-check-input" type="checkbox" data-kt-check="true"
                data-kt-check-target="#kt_table_users .form-check-input" value="1" />
            </div>
          </th>
          <th class="min-w-25px">Nomor</th>
          <th class="min-w-125px text-center">Nama</th>
          <th class="min-w-125px text-center">File</th>
          <th class="min-w-125px text-center">Nomor Peserta <br> NISN</th>
          <th class="min-w-150px text-center">Tahap</th>
          <th class="text-end min-w-100px">Actions</th>
        </tr>
      </thead>
      <tbody class="text-gray-600 fw-semibold">
        @forelse ($users as $key=>$mahasiswa)
          <tr>
            <td>
              <div class="form-check form-check-sm form-check-custom form-check-solid">
                <input class="form-check-input" type="checkbox" value="1" />
              </div>
            </td>
            <td>
              <p>{{ $key + $users->firstItem() }}</p>
            </td>
            <td>
              <!--begin::User details-->
              <p>{{ $mahasiswa->name }}</p>
              <!--begin::User details-->
            </td>
            <td class="text-center">
              @if ($mahasiswa->userBio && ($mahasiswa->userBio->upload_kartu || $mahasiswa->userBio->upload_resi))
                <span><a class="badge badge-primary" href="{{ asset('upload_kartu/' . $mahasiswa->userBio->upload_kartu) }}">Lihat
                    Kartu</a></span><br>
                <span><a class="badge badge-danger" href="{{ asset('upload_resi/' . $mahasiswa->userBio->upload_resi) }}">Lihat
                    Resi</a></span>
              @endif
            </td>
            <td class="text-center">{{ $mahasiswa->no_peserta }} <br> {{ $mahasiswa->nisn }}</td>
            <td class="text-center">
              @if ($mahasiswa->status == 1)
                <span class="badge badge-danger">Belum Mendaftar</span>
              @elseif($mahasiswa->status == 2)
                <span class="badge badge-primary">Proses Verifikasi</span>
              @elseif($mahasiswa->status == 3)
                <span class="badge badge-warning">Perbaikan</span>
                <br>
                <p>{{ $mahasiswa->validator ? 'Validator : ' . $mahasiswa->validasi->name : null }}</p>
              @elseif($mahasiswa->status == 4)
                <span class="badge badge-success">Sudah Valid</span>
                <br>
                <p>{{ $mahasiswa->validator ? 'Validator : ' . $mahasiswa->validasi->name : null }}</p>
              @endif
            </td>
            <td class="text-end">
              <a href="#" class="btn btn-light btn-active-light-primary btn-flex btn-center btn-sm"
                data-kt-menu-trigger="click" data-kt-menu-placement="bottom-end">Actions
                <i class="ki-duotone ki-down fs-5 ms-1"></i></a>
              <!--begin::Menu-->
              <div data-kt-menu="true"
                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-600 menu-state-bg-light-primary fw-semibold fs-7 w-125px py-4">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="#" class="menu-link px-3" data-bs-toggle="modal"
                    data-bs-target="#kt_modal_{{ $mahasiswa->id }}">
                    Validasi
                  </a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <a href="{{ route('validasi.editdata', $mahasiswa->id) }}" class="menu-link px-3">
                    Edit Data
                  </a>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu item-->
                @if (Auth::user()->role == 10)
                  <div class="menu-item px-3">
                    <form action="{{ route('user.delete', $mahasiswa->id) }}" method="post">@csrf
                      <a onclick="if(confirm('Yakin mau dihapus?')) {event.preventDefault(); this.closest('form').submit();} else {alert('Penghapusan dibatalkan')}"
                        class="menu-link px-3">Hapus</a>
                    </form>
                  </div>
                @endif
                <!--end::Menu item-->
              </div>
              <!--end::Menu-->
            </td>
          </tr>

          {{-- Modal --}}
          <div class="modal fade" tabindex="-1" id="kt_modal_{{ $mahasiswa->id }}">
            <div class="modal-dialog">
              <div class="modal-content">
                <div class="modal-header">
                  <h3 class="modal-title">Proses @yield('title')</h3>

                  <!--begin::Close-->
                  <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal"
                    aria-label="Close">
                    <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
                  </div>
                  <!--end::Close-->
                </div>

                <form action="{{ route('validasi.update', $mahasiswa->id) }}" method="post">@csrf
                  <div class="modal-body">
                    <select name="status" class="form-select mb-4">
                      <option {{ $mahasiswa->status == 4 ? 'selected' : null }} value="4">Sudah Valid</option>
                      <option {{ $mahasiswa->status == 3 ? 'selected' : null }} value="3">Perbaikan</option>
                      <option {{ $mahasiswa->status == 0 ? 'selected' : null }} value="0">Tolak Peserta</option>
                    </select>
                    <div class="form-floating">
                      <textarea name="keterangan" class="form-control" placeholder="Leave a comment here" id="floatingTextarea">{{ $mahasiswa->userBio ? $mahasiswa->userBio->keterangan : null }}</textarea>
                      <label for="floatingTextarea">Keterangan</label>
                    </div>
                  </div>

                  <div class="modal-footer">
                    <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
                    <button onClick="this.form.submit(); this.disabled=true; this.innerText='Mohon Tunggu…'; " type="submit"
                      class="btn btn-primary">{{ 'Simpan' }}</button>
                  </div>
                </form>
              </div>
            </div>
          </div>
          {{-- Modal --}}
        @empty
          <tr class="text-center">
            <td colspan="7">Data Tidak Ditemukan</td>
          </tr>
        @endforelse
      </tbody>
    </table>

    <div class="my-3 pagination pagination-circle pagination-outline">
      {{ $users->onEachSide(1)->withQueryString()->links() }}
    </div>
    <!--end::Table-->
  </div>

  {{-- MODAL --}}
  <div class="modal fade" tabindex="-1" id="create_new">
    <div class="modal-dialog">
      <div class="modal-content">
        <div class="modal-header">
          <h3 class="modal-title">Tambah Pengguna</h3>

          <!--begin::Close-->
          <div class="btn btn-icon btn-sm btn-active-light-primary ms-2" data-bs-dismiss="modal" aria-label="Close">
            <i class="ki-duotone ki-cross fs-1"><span class="path1"></span><span class="path2"></span></i>
          </div>
          <!--end::Close-->
        </div>

        <form action="{{ route('user.save') }}" method="post">@csrf
          <div class="modal-body">
            <!--begin::Input group-->
            <div class="fv-row mb-7">
              <!--begin::Label-->
              <label class="required fw-semibold fs-6 mb-2">Nama Lengkap</label>
              <!--end::Label-->
              <!--begin::Input-->
              <input type="text" name="nama_lengkap" value="{{ $user->name ?? old('nama_lengkap') }}"
                class="form-control form-control-solid mb-3 mb-lg-0" placeholder="Masukan Nama Lengkap" />
              <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
              <!--begin::Label-->
              <label class="required fw-semibold fs-6 mb-2">No. Peserta</label>
              <!--end::Label-->
              <!--begin::Input-->
              <input type="text" name="no_peserta" value="{{ $user->no_peserta ?? old('no_peserta') }}" class="form-control form-control-solid mb-3 mb-lg-0"
                placeholder="Masukan No Peserta" />
              <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
              <!--begin::Label-->
              <label class="required fw-semibold fs-6 mb-2">NISN</label>
              <!--end::Label-->
              <!--begin::Input-->
              <input type="text" name="nisn" value="{{ $user->nisn ?? old('nisn') }}" class="form-control form-control-solid mb-3 mb-lg-0"
                placeholder="Masukan No Peserta" />
              <!--end::Input-->
            </div>
            <!--end::Input group-->
            <!--begin::Input group-->
            <div class="fv-row mb-7">
              <!--begin::Label-->
              <label class="fw-semibold fs-6 mb-2">Nilai</label>
              <!--end::Label-->
              <!--begin::Input-->
              <input type="text" name="nilai" value="{{ $user->nilai ?? old('nilai') }}" class="form-control form-control-solid mb-3 mb-lg-0"
                placeholder="Masukan Nilai Peserta" />
              <!--end::Input-->
            </div>
            <!--end::Input group-->
          </div>

          <div class="modal-footer">
            <button type="button" class="btn btn-light" data-bs-dismiss="modal">Tutup</button>
            <button onClick="this.form.submit(); this.disabled=true; this.innerText='Mohon Tunggu…'; " class="btn btn-primary">{{ 'Simpan' }}</button>
          </div>
        </form>
      </div>
    </div>
  </div>
  {{-- MODAL --}}
@endsection
