@extends('layouts.admin')

@section('content')

<div class="main-content">
<section class="section">

<div class="section-header">
    <h1>Data Buku</h1>
</div>

<div class="section-body">

<a href="{{ route('books.create') }}"
   class="btn btn-primary mb-3">
    Tambah Buku
</a>

<div class="card">
<div class="card-body">

<table class="table table-bordered">
<thead>
<tr>
    <th>No</th>
    <th>Judul</th>
    <th>Penulis</th>
    <th>Penerbit</th>
    <th>Tahun</th>
    <th>Stok</th>
    <th>Aksi</th>
</tr>
</thead>

<tbody>
@foreach($books as $book)
<tr>
    <td>{{ $loop->iteration }}</td>
    <td>{{ $book->judul }}</td>
    <td>{{ $book->penulis }}</td>
    <td>{{ $book->penerbit }}</td>
    <td>{{ $book->tahun_terbit }}</td>
    <td>{{ $book->stok }}</td>

    <td>

        <a href="{{ route('books.edit',$book->id) }}"
           class="btn btn-warning btn-sm">
            Edit
        </a>

        <form action="{{ route('books.destroy',$book->id) }}"
              method="POST"
              style="display:inline">
            @csrf
            @method('DELETE')

            <button class="btn btn-danger btn-sm">
                Hapus
            </button>
        </form>

    </td>
</tr>
@endforeach
</tbody>

</table>

</div>
</div>

</div>
</section>
</div>

@endsection