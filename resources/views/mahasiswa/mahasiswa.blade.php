@extends('layouts.master')
@section('title', 'Pendaftaran Seleksi Mandiri Tahap 2')
@section('js')
<script>
  document.querySelector("#upload_kartu").onchange = function() {
    const fileName = this.files[0].name;
    const label = document.querySelector("label[for=upload_kartu]");
    label.innerText = fileName ?? "Pilih File";
  };

  document.querySelector("#upload_resi").onchange = function() {
    const fileName = this.files[0].name;
    const label = document.querySelector("label[for=upload_resi]");
    label.innerText = fileName ?? "Pilih File";
  };
</script>
@endsection
@section('content')
  <!--begin::Basic info-->
  <div class="card mb-5 mb-xl-10">
    <!--begin::Card header-->
    <div class="card-header border-0 cursor-pointer" role="button" data-bs-toggle="collapse" data-bs-target="#kt_account_profile_details" aria-expanded="true" aria-controls="kt_account_profile_details">
      <!--begin::Card title-->
      <div class="card-title m-0">
        <h3 class="fw-bold m-0">
          Biodata {{ $mhs->name }}
        </h3>
      </div>
      <!--end::Card title-->
    </div>
    <!--begin::Card header-->
    
    <!--begin::Content-->
    <div id="kt_account_settings_profile_details" class="collapse show">
      <!--begin::Form-->
      <form id="myForm" class="form" action="{{ route('mahasiswa.update') }}" method="POST" enctype="multipart/form-data">@csrf
        <!--begin::Card body-->
        <div class="card-body border-top p-9">
          @if($mhs->status == 1)
            <h3 class="btn btn-sm btn-danger">Belum Mendaftar</h3>
          @elseif($mhs->status == 2)
            <h3 class="btn btn-sm btn-primary" >Proses Verifikasi</h3>
          @elseif($mhs->status == 3)
            <h3 class="btn btn-sm btn-warning">Perbaikan</h3><br>
            <span style="font-size: 10pt" class="text-danger">*Catatan : {{ $mhs->keterangan }}</span>
          @elseif($mhs->status == 4)
            <h3 class="btn btn-sm btn-success">Sudah Valid</h3>
          @endif
          <!--begin::Dua Kolom Input group-->
          <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nama Lengkap</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
              <!--begin::Row-->
              <div class="row">
                <!--begin::Col-->
                <div class="col-lg-12 fv-row">
                  <input readonly type="text" name="name" value="{{ $mhs->name ?? old('name') }}" class="form-control form-control-lg" />
                </div>
                <!--end::Col-->
              </div>
              <!--end::Row-->
            </div>
            <!--end::Col-->
          </div>
          <!--end::Dua Kolom Input group-->

          <!--begin::Dua Kolom Input group-->
          <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nilai</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
              <!--begin::Row-->
              <div class="row">
                <!--begin::Col-->
                <div class="col-lg-12 fv-row">
                  <input readonly type="text" name="name" value="{{ $mhs->nilai }}" class="form-control form-control-lg" />
                </div>
                <!--end::Col-->
              </div>
              <!--end::Row-->
            </div>
            <!--end::Col-->
          </div>
          <!--end::Dua Kolom Input group-->

          <!--begin::Dua Kolom Input group-->
          <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Nomor Peserta dan NISN</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
              <!--begin::Row-->
              <div class="row">
                <!--begin::Col-->
                <div class="col-lg-6 fv-row">
                  <input readonly type="text" name="no_peserta" value="{{ $mhs->no_peserta }}"
                    class="form-control form-control-lg mb-3 mb-lg-0" />
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-6 fv-row">
                  <input readonly type="text" name="nisn" value="{{ $mhs->nisn}}"
                    class="form-control form-control-lg" />
                </div>
                <!--end::Col-->
              </div>
              <!--end::Row-->
            </div>
            <!--end::Col-->
          </div>
          <!--end::Dua Kolom Input group-->

          <!--begin::Dua Kolom Input group-->
          <div class="row mb-6">
            <!--begin::Label-->
            <label class="col-lg-4 col-form-label required fw-semibold fs-6">Kartu Peserta dan Resi Pembayaran</label>
            <!--end::Label-->
            <!--begin::Col-->
            <div class="col-lg-8">
              <!--begin::Row-->
              <div class="row justify-content-center">
                <!--begin::Col-->
                <div class="col-lg-6 fv-row">
                  <label for="upload_kartu" class="btn btn-info mb-3 mb-lg-0">Upload Kartu Ujian SMUBT</label>
                  <input type="file" style="display:none;" name="upload_kartu" id="upload_kartu" class="form-control form-control-lg form-control-solid">
                  @if ($mhs->upload_kartu)
                    <br><span class="text-info">Kartu Ujian Anda : <a href="{{ asset('upload_kartu/'.$mhs->upload_kartu) }}">Lihat</a></span>
                  @endif
                </div>
                <!--end::Col-->
                <!--begin::Col-->
                <div class="col-lg-6 fv-row">
                  <label for="upload_resi" class="btn btn-info">Upload Resi Pembayaran</label>
                  <input type="file" style="display:none;" name="upload_resi" id="upload_resi" class="form-control form-control-lg form-control-solid">
                  @if ($mhs->upload_resi)
                    <br><span class="text-info">Resi Pembayaran Anda : <a href="{{ asset('upload_resi/'.$mhs->upload_resi) }}">Lihat</a></span>
                  @endif
                </div>
                <!--end::Col-->
              </div>
              <!--end::Row-->
            </div>
            <!--end::Col-->
          </div>
          <!--end::Dua Kolom Input group-->
        </div>
        <!--end::Card body-->
        <!--begin::Actions-->
        <div class="card-footer d-flex justify-content-end py-6 px-9">
          <button type="reset" class="btn btn-light btn-active-light-primary me-2"
            onclick="history.back()">Kembali</button>
          <button type="submit" onClick="this.form.submit(); this.disabled=true; this.innerText='Mohon Tunggu…'; "
          class="btn btn-primary mt-2">Simpan</button>
        </div>
        <!--end::Actions-->
      </form>
      <!--end::Form-->
    </div>
    <!--end::Content-->
  </div>
  <!--end::Basic info-->
@endsection