@extends('layouts.admin')

@section('content')

<div class="main-content">
<section class="section">

<div class="section-header">
    <h1>Tambah Peminjaman</h1>
</div>

<div class="card">
<div class="card-body">

<form action="{{ route('loans.store') }}"
      method="POST">

@csrf

<div class="form-group">
    <label>User</label>

    <select name="user_id"
            class="form-control select2"
            required>

        <option value="">
            -- Cari User --
        </option>

        @foreach($users as $user)
            <option value="{{ $user->id }}">
                {{ $user->name }}
            </option>
        @endforeach

    </select>
</div>

<div class="form-group">
    <label>Buku</label>

    <select name="book_id"
            class="form-control select2"
            required>

        <option value="">
            -- Cari Buku --
        </option>

        @foreach($books as $book)
            <option value="{{ $book->id }}">
                {{ $book->judul }}
                (Stok: {{ $book->stok }})
            </option>
        @endforeach

    </select>
</div>

<button type="submit"
        class="btn btn-primary">
    Simpan
</button>

<a href="{{ route('loans.index') }}"
   class="btn btn-secondary">
    Kembali
</a>

</form>

</div>
</div>

</section>
</div>

@endsection