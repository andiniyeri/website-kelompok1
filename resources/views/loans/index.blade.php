@extends('layouts.admin')

@section('content')

<div class="main-content">
<section class="section">

<div class="d-flex justify-content-between align-items-center mb-4">
    <h1>Data Peminjaman</h1>

    <a href="{{ route('loans.create') }}"
       class="btn btn-primary">
        <i class="fas fa-plus"></i>
        Tambah Peminjaman
    </a>
</div>

<div class="section-body">

<form action="{{ route('loans.index') }}"
      method="GET"
      class="d-flex mb-3">

    <input type="text"
           name="search"
           class="form-control mr-2"
           placeholder="Cari user / buku / status"
           value="{{ request('search') }}">

    <button type="submit"
            class="btn btn-info">
        Cari
    </button>

    <a href="{{ route('loans.index') }}"
       class="btn btn-secondary ml-2">
        Reset
    </a>

</form>

<div class="card">
<div class="card-body">

<table class="table table-bordered">

<thead>
<tr>
    <th>No</th>
    <th>User</th>
    <th>Buku</th>
    <th>Tanggal Pinjam</th>
    <th>Status</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>

@forelse($loans as $loan)

<tr>

    <td>{{ $loop->iteration }}</td>

    <td>{{ $loan->user->name }}</td>

    <td>{{ $loan->book->judul }}</td>

    <td>{{ $loan->borrow_date }}</td>

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

    <td>

        @if($loan->status == 'borrowed')

        <form action="{{ route('loans.return', $loan->id) }}"
              method="POST">

            @csrf
            @method('PUT')

            <button class="btn btn-success btn-sm">
                Kembalikan
            </button>

        </form>

        @endif

    </td>

</tr>

@empty

<tr>
    <td colspan="6" class="text-center">
        Belum ada data
    </td>
</tr>

@endforelse

</tbody>

</table>

</div>
</div>

</div>

</section>
</div>

@endsection