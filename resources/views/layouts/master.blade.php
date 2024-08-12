<!DOCTYPE html>
<html lang="en">
<!--begin::Head-->

<head>
  <base href="/" />
  <title> @yield('title') | {{ config('matt.nama_app') }}</title>
  <meta charset="utf-8" />
  <meta name="description" content="{{ config('matt.deskripsi') }}" />
  <meta name="keywords"
    content="mandiri ubt, ubt, universitas borneo, smubt" />
  <meta name="viewport" content="width=device-width, initial-scale=1" />
  <meta property="og:locale" content="id_ID" />
  <meta property="og:type" content="website" />
  <meta property="og:title" content="{{ config('matt.nama_app') }}" />
  <meta property="og:url" content="https://smtahap2.ubt.ac.id" />
  <meta property="og:site_name" content="SMUBT Tahap 2 | Universitas Borneo Tarakan" />
  <link rel="canonical" href="https://smtahap2.ubt.ac.id" />
  <link rel="shortcut icon" href="{{ asset('assets/media/logos/favicon.ico') }}" />
  <!--begin::Fonts(mandatory for all pages)-->
  <link rel="stylesheet" href="https://fonts.googleapis.com/css?family=Inter:300,400,500,600,700" />
  <!--end::Fonts-->
  <!--begin::Vendor Stylesheets(used for this page only)-->

  @yield('css')
  
  <style>
    .table-responsive::-webkit-scrollbar {
      -webkit-appearance: none;
    }

    .table-responsive::-webkit-scrollbar:vertical {
      width: 8px;
    }

    .table-responsive::-webkit-scrollbar:horizontal {
      height: 15px;
    }

    .table-responsive::-webkit-scrollbar-thumb {
      background-color: rgba(0, 0, 0, .5);
      border-radius: 7px;
      border: 2px solid #ffffff;
    }

    .table-responsive::-webkit-scrollbar-track {
      border-radius: 7px;
      background-color: #cccccc;
    }
  </style>

  <!--end::Vendor Stylesheets-->
  <!--begin::Global Stylesheets Bundle(mandatory for all pages)-->
  <link href="{{ asset('assets/plugins/global/plugins.bundle.css') }}" rel="stylesheet" type="text/css" />
  <link href="{{ asset('assets/css/style.bundle.css') }}" rel="stylesheet" type="text/css" />
  <!--end::Global Stylesheets Bundle-->
  <script>
    // Frame-busting to prevent site from being loaded within a frame without permission (click-jacking) if (window.top != window.self) { window.top.location.replace(window.self.location.href); }
  </script>
</head>
<!--end::Head-->
<!--begin::Body-->

<body id="kt_body" data-kt-app-page-loading-enabled="true" data-kt-app-page-loading="on">
  <!--begin::Theme mode setup on page load-->
  <script>
    var defaultThemeMode = "light";
    var themeMode;
    if (document.documentElement) {
      if (document.documentElement.hasAttribute("data-bs-theme-mode")) {
        themeMode = document.documentElement.getAttribute("data-bs-theme-mode");
      } else {
        if (localStorage.getItem("data-bs-theme") !== null) {
          themeMode = localStorage.getItem("data-bs-theme");
        } else {
          themeMode = defaultThemeMode;
        }
      }
      if (themeMode === "system") {
        themeMode = window.matchMedia("(prefers-color-scheme: dark)").matches ? "dark" : "light";
      }
      document.documentElement.setAttribute("data-bs-theme", themeMode);
    }
  </script>
  <!--end::Theme mode setup on page load-->
  <!--begin::loader-->
  <div class="page-loader flex-column">
    <img alt="{{ config('matt.nama_app') }}" class="theme-light-show h-70px" src="{{ asset('ubt.png') }}" />
    <img alt="{{ config('matt.nama_app') }}" class="theme-dark-show h-70px" src="{{ asset('ubt.png') }}" />
    <h2 class="mt-3">{{ config('matt.nama_app') }}</h2>
    <div class="d-flex align-items-center mt-5">
      <span class="spinner-border text-primary" role="status"></span>
      <span class="text-muted fs-6 fw-semibold ms-5">Loading...</span>
    </div>
  </div>
  <!--end::Loader-->
  <!--begin::Main-->
  <!--begin::Root-->
  <div class="d-flex flex-column flex-root">
    <!--begin::Page-->
    <div class="page d-flex flex-row flex-column-fluid">
      <!--begin::Aside-->
      <div id="kt_aside" class="aside pt-7 pb-4 pb-lg-7 pt-lg-17" data-kt-drawer="true" data-kt-drawer-name="aside"
        data-kt-drawer-activate="{default: true, lg: false}" data-kt-drawer-overlay="true"
        data-kt-drawer-width="{default:'200px', '300px': '250px'}" data-kt-drawer-direction="start"
        data-kt-drawer-toggle="#kt_aside_toggle">
        <!--begin::Aside user-->
        <div class="aside-user mb-5 mb-lg-10" id="kt_aside_user">
          <!--begin::User-->
          <div class="d-flex align-items-center flex-column">
            <!--begin::Symbol-->
            <a href="/">
              <div class="symbol symbol-75px mb-4">
                <img src="{{ asset(config('matt.logo')) }}" alt="" />
              </div>
            </a>
            <!--end::Symbol-->
            <!--begin::Info-->
            <div class="text-center">
              <!--begin::Username-->
              <a href="/" class="text-gray-800 text-hover-primary fs-4 fw-bolder">{{ config('matt.nama_app') }}</a>
              <!--end::Username-->
              <!--begin::Description-->
              <span class="text-gray-600 fw-semibold d-block fs-7 mb-1">{{ Auth::user()->name ?? null }}</span>
              <!--end::Description-->
            </div>
            <!--end::Info-->
          </div>
          <!--end::User-->
        </div>
        <!--end::Aside user-->
        <!--begin::Aside menu-->
        <div class="aside-menu flex-column-fluid ps-3 ps-lg-5 pe-1 mb-9" id="kt_aside_menu">
          <!--begin::Aside Menu-->
          <div class="w-100 hover-scroll-overlay-y pe-2 me-2" id="kt_aside_menu_wrapper" data-kt-scroll="true"
            data-kt-scroll-activate="{default: false, lg: true}" data-kt-scroll-height="auto"
            data-kt-scroll-dependencies="#kt_aside_logo, #kt_aside_user, #kt_aside_footer"
            data-kt-scroll-wrappers="#kt_aside, #kt_aside_menu, #kt_aside_menu_wrapper" data-kt-scroll-offset="0">
            <!--begin::Menu-->
            <div class="menu menu-column menu-rounded menu-sub-indention menu-active-bg fw-semibold" id="#kt_aside_menu"
              data-kt-menu="true">
              @if (Auth::check())
                <div class="menu-item {{ Request::is('/','home','dashboard') ? 'here show' : '' }} menu-accordion">
                  <a href="{{ url('dashboard') }}" class="menu-link">
                    <span class="menu-icon">
                      <i class="ki-duotone ki-home-2 fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                      </i>
                    </span>
                    <span class="menu-title">Dashboard</span>
                  </a>
                </div>
                @if (Auth::check() && Auth::user()->role < 90)
                  <!--begin:Menu item-->
                  <div data-kt-menu-trigger="click" class="menu-item here show menu-accordion">
                    <!--begin:Menu link-->
                    <span class="menu-link">
                      <span class="menu-icon">
                        <i class="ki-duotone ki-briefcase fs-2">
                          <span class="path1"></span>
                          <span class="path2"></span>
                        </i>
                      </span>
                      <span class="menu-title">Validasi</span>
                      <span class="menu-arrow"></span>
                    </span>
                    <!--end:Menu link-->
                    <!--begin:Menu sub-->
                    <div class="menu-sub menu-sub-accordion">
                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ Request::is('validasi/1') ? 'active' : '' }}" href="{{ route('validasi.index',1) }}"
                          title="Verifikasi Alamat Email anda di inbox atau folder spam email anda" data-bs-toggle="tooltip"
                          data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">Semua Peserta</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->
                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ Request::is('validasi/2') ? 'active' : '' }}" href="{{ route('validasi.index',2) }}"
                          title="Isi Survei, Pemberkasan, Validasi" data-bs-toggle="tooltip"
                          data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">Proses Verifikasi</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->
                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ Request::is('validasi/3') ? 'active' : '' }}" href="{{ route('validasi.index',3) }}"
                          title="Validasi BAKK, SK Kelulusan" data-bs-toggle="tooltip"
                          data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">Perbaikan</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->
                      <!--begin:Menu item-->
                      <div class="menu-item">
                        <!--begin:Menu link-->
                        <a class="menu-link {{ Request::is('validasi/4') ? 'active' : '' }}" href="{{ route('validasi.index',4) }}"
                        title="Cetak Bukti Pendaftaran Wisuda" data-bs-toggle="tooltip" data-bs-trigger="hover" data-bs-dismiss="click" data-bs-placement="right">
                          <span class="menu-bullet">
                            <span class="bullet bullet-dot"></span>
                          </span>
                          <span class="menu-title">Sudah Valid</span>
                        </a>
                        <!--end:Menu link-->
                      </div>
                      <!--end:Menu item-->
                    </div>
                    <!--end:Menu sub-->
                  </div>
                  <!--end:Menu item-->
                @endif
                {{-- <div class="menu-item {{ Request::is('/','home','dashboard') ? 'here show' : '' }} menu-accordion">
                  <a href="{{ url('dashboard') }}" class="menu-link">
                    <span class="menu-icon">
                      <i class="ki-duotone ki-user-tick fs-2">
                        <span class="path1"></span>
                        <span class="path2"></span>
                        <span class="path3"></span>
                      </i>
                    </span>
                    <span class="menu-title">Biodata</span>
                  </a>
                </div> --}}
              @endif
            </div>
            <!--end::Menu-->
          </div>
          <!--end::Aside Menu-->
        </div>
        <!--end::Aside menu-->
        <!--begin::Footer-->
        <div class="aside-footer flex-column-auto px-6 px-lg-9" id="kt_aside_footer">
          <!--begin::User panel-->
          <div class="d-flex flex-stack ms-7">
            <!--begin::Link-->
            <form method="POST" action="{{ url('logout') }}">@csrf
              <a onclick="if(confirm('Yakin mau Logout?')) {event.preventDefault(); this.closest('form').submit();} else {alert('Logout dibatalkan')}"
                class="btn btn-sm btn-icon btn-active-color-primary btn-icon-gray-600 btn-text-gray-600">
                <i class="ki-duotone ki-entrance-left fs-1 me-2">
                  <span class="path1"></span>
                  <span class="path2"></span>
                </i>
                <!--begin::Major-->
                <span class="d-flex flex-shrink-0 fw-bold">{{ __('Log Out') }}</span>
                <!--end::Major-->
              </a>
            </form>
            <!--end::Link-->
            <!--begin::User menu-->
            <div class="ms-1">
              <div class="btn btn-sm btn-icon btn-icon-gray-600 btn-active-color-primary position-relative me-n1"
                data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start">
                <i class="ki-duotone ki-setting-2 fs-1">
                  <span class="path1"></span>
                  <span class="path2"></span>
                </i>
              </div>
              <!--begin::User account menu-->
              <div
                class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                data-kt-menu="true">
                <!--begin::Menu item-->
                <div class="menu-item px-3">
                  <div class="menu-content d-flex align-items-center px-3">
                    <!--begin::Avatar-->
                    <div class="symbol symbol-50px me-5">
                      @auth
                        <img alt="Logo" src="{{ File::exists('avatar/'.Auth::user()->username.'.jpg') ? asset('avatar/'.Auth::user()->username.'.jpg') : asset('assets/media/svg/files/blank-image.svg') }}" />
                      @endauth
                    </div>
                    <!--end::Avatar-->
                    <!--begin::Username-->
                    <div class="d-flex flex-column">
                      <div class="fw-bold d-flex align-items-center fs-5">{{ Auth::check() && Auth::user()->name }}
                        <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">
                          @auth
                            @foreach (config('matt.role') as $key=>$value)
                              @if ($key == Auth::user()->role)
                                {{ $value }}
                              @endif
                            @endforeach
                          @endauth
                        </span>
                      </div>
                      <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::check() && Auth::user()->no_peserta }}</a>
                    </div>
                    <!--end::Username-->
                  </div>
                </div>
                <!--end::Menu item-->
                <!--begin::Menu separator-->
                <div class="separator my-2"></div>
                <!--end::Menu separator-->
                <!--begin::Menu item-->
                <div class="menu-item px-5">
                  <form method="POST" action="{{ route('logout') }}">@csrf
                    <a onclick="if(confirm('Yakin mau Logout?')) {event.preventDefault(); this.closest('form').submit();} else {alert('Logout dibatalkan')}"
                      class="menu-link px-5">Log Out</a>
                  </form>
                </div>
                <!--end::Menu item-->
              </div>
              <!--end::User account menu-->
            </div>
            <!--end::User menu-->
          </div>
          <!--end::User panel-->
        </div>
        <!--end::Footer-->
      </div>
      <!--end::Aside-->
      <!--begin::Wrapper-->
      <div class="wrapper d-flex flex-column flex-row-fluid" id="kt_wrapper">
        <!--begin::Header-->
        <div id="kt_header" class="header">
          <!--begin::Container-->
          <div class="container-fluid d-flex align-items-center flex-wrap justify-content-between"
            id="kt_header_container">
            <!--begin::Page title-->
            <div
              class="page-title d-flex flex-column align-items-start justify-content-center flex-wrap me-2 pb-5 pb-lg-0 pt-7 pt-lg-0"
              data-kt-swapper="true" data-kt-swapper-mode="prepend"
              data-kt-swapper-parent="{default: '#kt_content_container', lg: '#kt_header_container'}">
              <!--begin::Heading-->
              <h1 class="d-flex flex-column text-dark fw-bold my-0 fs-1">@yield('title')</h1>
              <!--end::Heading-->
              <h5 class="text-info">Program Studi Akuakultur</h5>
              <!--begin::Breadcrumb-->
              <ul class="breadcrumb breadcrumb-dot fw-semibold fs-base my-1">
                <li class="breadcrumb-item text-muted">
                  <a href="/" class="text-muted text-hover-primary">Home</a>
                </li>

                @yield('bread')

              </ul>
              <!--end::Breadcrumb-->
            </div>
            <!--end::Page title=-->
            <!--begin::Wrapper-->
            <div class="d-flex d-lg-none align-items-center ms-n4 me-2">
              <!--begin::Aside mobile toggle-->
              <div class="btn btn-icon btn-active-icon-primary" id="kt_aside_toggle">
                <i class="ki-duotone ki-abstract-14 fs-1 mt-1">
                  <span class="path1"></span>
                  <span class="path2"></span>
                </i>
              </div>
              <!--end::Aside mobile toggle-->
              <!--begin::Logo-->
              <a href="/" class="d-flex align-items-center">
                <img alt="Logo" src="{{ asset('ubt.png') }}" class="h-40px" />
              </a>
              <!--end::Logo-->
            </div>
            <!--end::Wrapper-->
            <!--begin::Topbar-->
            <div class="d-flex align-items-center flex-shrink-0">
              <!--begin::Activities-->
              <div class="d-flex align-items-center ms-3 ms-lg-4">
                <!--begin::Drawer toggle-->
                <div class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline w-40px h-40px"
                  data-kt-menu-trigger="click" data-kt-menu-overflow="true" data-kt-menu-placement="top-start">
                  <i class="ki-duotone ki-setting-2 fs-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                  </i>
                </div>
                <!--begin::User account menu-->
                <div
                  class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-gray-800 menu-state-bg menu-state-color fw-semibold py-4 fs-6 w-275px"
                  data-kt-menu="true">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3">
                    <div class="menu-content d-flex align-items-center px-3">
                      <!--begin::Avatar-->
                      <div class="symbol symbol-50px me-5">
                        @auth
                        <img alt="Logo" src="{{ File::exists('avatar/' . Auth::user()->username . '.jpg') ? asset('avatar/' . Auth::user()->username . '.jpg') : asset('assets/media/svg/files/blank-image.svg') }}" />
                        @endauth
                      </div>
                      <!--end::Avatar-->
                      <!--begin::Username-->
                      <div class="d-flex flex-column">
                        <div class="fw-bold d-flex align-items-center fs-5">{{ Auth::check() && Auth::user()->name }}
                          <span class="badge badge-light-success fw-bold fs-8 px-2 py-1 ms-2">
                            @auth
                              @foreach (config('matt.role') as $key=>$value)
                              {{ $key == Auth::user()->role ? $value : '' }}
                              @endforeach
                            @endauth
                          </span>
                        </div>
                        <a href="#" class="fw-semibold text-muted text-hover-primary fs-7">{{ Auth::check() && Auth::user()->no_peserta }}</a>
                      </div>
                      <!--end::Username-->
                    </div>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu separator-->
                  <div class="separator my-2"></div>
                  <!--end::Menu separator-->
                  <!--begin::Menu item-->
                  @if (Auth::check() && Auth::user()->role < 90)
                    <div class="menu-item px-5 my-1">
                      <a href="{{ route('profile.show') }}" class="menu-link px-5">Pengaturan Akun</a>
                    </div>
                  @endif
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-5">
                    <form method="POST" action="{{ url('logout') }}">@csrf
                      <a href="{{ url('logout') }}"
                        onclick="if(confirm('Yakin mau Logout?')) {event.preventDefault(); this.closest('form').submit();} else {alert('Logout dibatalkan')}" class="menu-link px-5">Log
                        Out</a>
                    </form>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::User account menu-->
                <!--end::Drawer toggle-->
              </div>
              <!--end::Activities-->
              <!--begin::Theme mode-->
              <div class="d-flex align-items-center ms-3 ms-lg-4">
                <!--begin::Menu toggle-->
                <a href="#"
                  class="btn btn-icon btn-color-gray-700 btn-active-color-primary btn-outline w-40px h-40px"
                  data-kt-menu-trigger="{default:'click', lg: 'hover'}" data-kt-menu-attach="parent"
                  data-kt-menu-placement="bottom-end">
                  <i class="ki-duotone ki-night-day theme-light-show fs-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                    <span class="path3"></span>
                    <span class="path4"></span>
                    <span class="path5"></span>
                    <span class="path6"></span>
                    <span class="path7"></span>
                    <span class="path8"></span>
                    <span class="path9"></span>
                    <span class="path10"></span>
                  </i>
                  <i class="ki-duotone ki-moon theme-dark-show fs-1">
                    <span class="path1"></span>
                    <span class="path2"></span>
                  </i>
                </a>
                <!--begin::Menu toggle-->
                <!--begin::Menu-->
                <div
                  class="menu menu-sub menu-sub-dropdown menu-column menu-rounded menu-title-gray-700 menu-icon-gray-500 menu-active-bg menu-state-color fw-semibold py-4 fs-base w-150px"
                  data-kt-menu="true" data-kt-element="theme-mode-menu">
                  <!--begin::Menu item-->
                  <div class="menu-item px-3 my-0">
                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="light">
                      <span class="menu-icon" data-kt-element="icon">
                        <i class="ki-duotone ki-night-day fs-2">
                          <span class="path1"></span>
                          <span class="path2"></span>
                          <span class="path3"></span>
                          <span class="path4"></span>
                          <span class="path5"></span>
                          <span class="path6"></span>
                          <span class="path7"></span>
                          <span class="path8"></span>
                          <span class="path9"></span>
                          <span class="path10"></span>
                        </i>
                      </span>
                      <span class="menu-title">Light</span>
                    </a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3 my-0">
                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="dark">
                      <span class="menu-icon" data-kt-element="icon">
                        <i class="ki-duotone ki-moon fs-2">
                          <span class="path1"></span>
                          <span class="path2"></span>
                        </i>
                      </span>
                      <span class="menu-title">Dark</span>
                    </a>
                  </div>
                  <!--end::Menu item-->
                  <!--begin::Menu item-->
                  <div class="menu-item px-3 my-0">
                    <a href="#" class="menu-link px-3 py-2" data-kt-element="mode" data-kt-value="system">
                      <span class="menu-icon" data-kt-element="icon">
                        <i class="ki-duotone ki-screen fs-2">
                          <span class="path1"></span>
                          <span class="path2"></span>
                          <span class="path3"></span>
                          <span class="path4"></span>
                        </i>
                      </span>
                      <span class="menu-title">System</span>
                    </a>
                  </div>
                  <!--end::Menu item-->
                </div>
                <!--end::Menu-->
              </div>
              <!--end::Theme mode-->
              <!--begin::Sidebar Toggler-->
              <!--end::Sidebar Toggler-->
            </div>
            <!--end::Topbar-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::Header-->
        <!--begin::Content-->
        <div class="content d-flex flex-column flex-column-fluid" id="kt_content">
          <!--begin::Container-->
          <div class="container-fluid" id="kt_content_container">

            @yield('content')

          </div>
          <!--end::Container-->
        </div>
        <!--end::Content-->
        <!--begin::Footer-->
        <div class="footer py-4 d-flex flex-lg-column" id="kt_footer">
          <!--begin::Container-->
          <div class="container-fluid d-flex flex-column flex-md-row flex-stack">
            <!--begin::Copyright-->
            <div class="text-dark order-2 order-md-1">
              <span class="text-gray-400 fw-semibold me-1">Created by</span>
              <a href="https://keenthemes.com" target="_blank"
                class="text-muted text-hover-primary fw-semibold me-2 fs-6">Keenthemes</a>
            </div>
            <!--end::Copyright-->
            <!--begin::Menu-->
            <ul class="menu menu-gray-600 menu-hover-primary fw-semibold order-1">
              <li class="menu-item">
                <a href="https://www.ubt.ac.id/" target="_blank">Web</a>
              </li>
              <li class="menu-item">
                <a href="{{ config('matt.wa') }}" target="_blank">Hubungi Kami</a>
              </li>
            </ul>
            <!--end::Menu-->
          </div>
          <!--end::Container-->
        </div>
        <!--end::Footer-->
      </div>
      <!--end::Wrapper-->
    </div>
    <!--end::Page-->
  </div>
  <!--end::Root-->
  <!--end::Main-->
  <!--begin::Scrolltop-->
  <div id="kt_scrolltop" class="scrolltop" data-kt-scrolltop="true">
    <i class="ki-duotone ki-arrow-up">
      <span class="path1"></span>
      <span class="path2"></span>
    </i>
  </div>
  <!--end::Scrolltop-->
  <!--begin::Javascript-->
  <script>
    var hostUrl = "assets/";
  </script>
  <!--begin::Global Javascript Bundle(mandatory for all pages)-->
  <script src="{{ asset('assets/plugins/global/plugins.bundle.js') }}"></script>
  <script src="{{ asset('assets/js/scripts.bundle.js') }}"></script>
  <!--end::Global Javascript Bundle-->
  <!--begin::Custom Javascript(used for this page only)-->

  @yield('js')
  
  <script>
    @if (Session::has('status'))
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toastr-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };
      toastr.success("{{ Session::get('status') }}");
      @php
        Session::forget('status');
      @endphp
    @endif

    @if (Session::has('pesan'))
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toastr-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };
      toastr.success("{{ Session::get('pesan') }}");
      @php
        Session::forget('pesan');
      @endphp
    @endif

    @if (Session::has('success'))
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toastr-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };
      toastr.success("{{ Session::get('success') }}");
      @php
        Session::forget('success');
      @endphp
    @endif

    @if (Session::has('info'))
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toastr-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };
      toastr.info("{{ Session::get('info') }}");
      @php
        Session::forget('info');
      @endphp
    @endif

    @if (Session::has('warning'))
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toastr-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };
      toastr.warning("{{ Session::get('warning') }}");
      @php
        Session::forget('warning');
      @endphp
    @endif

    @if (Session::has('danger'))
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toastr-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };
      toastr.error("{{ Session::get('danger') }}");
      @php
        Session::forget('danger');
      @endphp
    @endif

    @if (Session::has('errors'))
      toastr.options = {
        "closeButton": false,
        "debug": false,
        "newestOnTop": false,
        "progressBar": false,
        "positionClass": "toastr-top-right",
        "preventDuplicates": false,
        "onclick": null,
        "showDuration": "300",
        "hideDuration": "1000",
        "timeOut": "7000",
        "extendedTimeOut": "1000",
        "showEasing": "swing",
        "hideEasing": "linear",
        "showMethod": "fadeIn",
        "hideMethod": "fadeOut"
      };
      toastr.error(
        "<ul class='mb-0'> @foreach ($errors->all() as $error) <li>{{ $error }}</li> @endforeach </ul>"
      );
      @php
        Session::forget('error');
      @endphp
    @endif
  </script>
  <!--end::Custom Javascript-->
  <!--end::Javascript-->
</body>
<!--end::Body-->

</html>
