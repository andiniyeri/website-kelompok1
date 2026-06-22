@extends('layouts.user')

@section('content')

<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Dashboard User</h1>
        </div>

        <div class="section-body">
            <div class="row">

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-primary">
                            <i class="fas fa-book"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Total Buku</h4>
                            </div>
                            <div class="card-body">
                                {{ $totalBooks }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-warning">
                            <i class="fas fa-book-reader"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Sedang Dipinjam</h4>
                            </div>
                            <div class="card-body">
                                {{ $borrowedBooks }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-success">
                            <i class="fas fa-history"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Riwayat Pinjaman</h4>
                            </div>
                            <div class="card-body">
                                {{ $loanHistory }}
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-lg-3 col-md-6 col-sm-6 col-12">
                    <div class="card card-statistic-1">
                        <div class="card-icon bg-danger">
                            <i class="fas fa-check-circle"></i>
                        </div>
                        <div class="card-wrap">
                            <div class="card-header">
                                <h4>Buku Dikembalikan</h4>
                            </div>
                            <div class="card-body">
                                {{ $returnedBooks }}
                            </div>
                        </div>
                    </div>
                </div>

            </div>
        </div>
    </section>
</div>

@endsection
