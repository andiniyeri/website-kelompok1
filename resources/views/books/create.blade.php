@extends('layouts.admin')

@section('content')

<div class="main-content">
<section class="section">

<div class="section-header">
    <h1>Tambah Buku</h1>
</div>

<form action="{{ route('books.store') }}" method="POST">

@csrf

<input type="text" name="judul" class="form-control mb-2" placeholder="Judul">

<input type="text" name="penulis" class="form-control mb-2" placeholder="Penulis">

<input type="text" name="penerbit" class="form-control mb-2" placeholder="Penerbit">

<input type="number" name="tahun_terbit" class="form-control mb-2" placeholder="Tahun Terbit">

<input type="number" name="stok" class="form-control mb-2" placeholder="Stok">

<button class="btn btn-primary">
    Simpan
</button>

</form>

</section>
</div>

@endsection