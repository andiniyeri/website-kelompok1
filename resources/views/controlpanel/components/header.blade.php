<!DOCTYPE html>
<html lang="en">
<head>
  <meta charset="UTF-8">
  <meta content="width=device-width, initial-scale=1, maximum-scale=1, shrink-to-fit=no" name="viewport">
  <title>Perpustakaan Mini</title>

  <!-- General CSS Files -->
  <link rel="stylesheet" href="{{ asset('assets/modules/bootstrap/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/fontawesome/css/all.min.css') }}">

  <!-- CSS Libraries -->
  <link rel="stylesheet" href="{{ asset('assets/modules/jqvmap/dist/jqvmap.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/summernote/summernote-bs4.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/owlcarousel2/dist/assets/owl.carousel.min.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/modules/owlcarousel2/dist/assets/owl.theme.default.min.css') }}">

  <!-- Template CSS -->
  <link rel="stylesheet" href="{{ asset('assets/css/style.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/components.css') }}">
  <link rel="stylesheet" href="{{ asset('assets/css/custom.css') }}">

</head>

<body>

<div id="app">
<div class="main-wrapper main-wrapper-1">

    <div class="navbar-bg"></div>

    <!-- Navbar -->
    <nav class="navbar navbar-expand-lg main-navbar">

        <!-- Tombol Sidebar -->
        <ul class="navbar-nav mr-auto">
            <li>
                <a href="#" data-toggle="sidebar" class="nav-link nav-link-lg">
                    <i class="fas fa-bars"></i>
                </a>
            </li>
        </ul>

        <!-- Profil -->
        <ul class="navbar-nav ml-auto">

            <li class="dropdown">

                <a href="#"
                   data-toggle="dropdown"
                   class="nav-link dropdown-toggle nav-link-lg nav-link-user">

                    <img alt="image"
                         src="{{ asset('assets/img/avatar/avatar-1.png') }}"
                         class="rounded-circle mr-1">

                    <div class="d-sm-none d-lg-inline-block">
                        {{ session('user_name') }}
                    </div>

                </a>

                <div class="dropdown-menu dropdown-menu-right">

                    <div class="dropdown-title">
                        Login sebagai {{ session('user_name') }}
                    </div>

                    <div class="dropdown-divider"></div>

                    <a href="{{ route('signout') }}"
                       class="dropdown-item has-icon text-danger">

                        <i class="fas fa-sign-out-alt"></i>
                        Logout

                    </a>

                </div>

            </li>

        </ul>

    </nav>

    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    @include('controlpanel.components.sidebar')