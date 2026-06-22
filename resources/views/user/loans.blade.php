@extends('layouts.user')

@section('content')

    <div class="main-content">
    <section class="section">

    <div class="section-header">
        <h1>Riwayat Peminjaman</h1>
    </div>

    <div class="card">
    <div class="card-body">

    <table class="table table-bordered">

    <thead>
    <tr>
        <th>No</th>
        <th>Judul Buku</th>
        <th>Tanggal Pinjam</th>
        <th>Tanggal Kembali</th>
        <th>Status</th>
    </tr>
    </thead>

    <tbody>

    @forelse($loans as $loan)

    <tr>

    <td>{{ $loop->iteration }}</td>

    <td>{{ $loan->book->judul }}</td>

    <td>{{ $loan->borrow_date }}</td>

    <td>
        {{ $loan->return_date ?? '-' }}
    </td>

    <td>

         @if($loan->status == 'borrowed')
        <span class="badge badge-warning">
            Dipinjam
        </span>

    @else

        <span class="badge badge-success">
            Dikembalikan
        </span>

    @endif

    </td>

    </tr>

    @empty

        <tr>
            <td colspan="5" class="text-center">
                Belum ada riwayat peminjaman
            </td>
        </tr>

    @endforelse

    </tbody>

    </table>

    </div>
    </div>

    </section>
    </div>

@endsection