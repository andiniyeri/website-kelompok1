@extends('layouts.admin')

@section('content')

<div class="main-content">
    <section class="section">

        <div class="section-header">
            <h1>Edit Buku</h1>
        </div>

        <div class="section-body">

            <div class="card">
                <div class="card-body">

                    <form action="{{ route('books.update', $book->id) }}" method="POST">
                        @csrf
                        @method('PUT')

                        <div class="form-group">
                            <label>Judul Buku</label>
                            <input type="text"
                                   name="judul"
                                   class="form-control"
                                   value="{{ $book->judul }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Penulis</label>
                            <input type="text"
                                   name="penulis"
                                   class="form-control"
                                   value="{{ $book->penulis }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Penerbit</label>
                            <input type="text"
                                   name="penerbit"
                                   class="form-control"
                                   value="{{ $book->penerbit }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Tahun Terbit</label>
                            <input type="number"
                                   name="tahun_terbit"
                                   class="form-control"
                                   value="{{ $book->tahun_terbit }}"
                                   required>
                        </div>

                        <div class="form-group">
                            <label>Stok</label>
                            <input type="number"
                                   name="stok"
                                   class="form-control"
                                   value="{{ $book->stok }}"
                                   required>
                        </div>

                        <button type="submit" class="btn btn-primary">
                            Update Buku
                        </button>

                        <a href="{{ route('books.index') }}"
                           class="btn btn-secondary">
                            Kembali
                        </a>

                    </form>

                </div>
            </div>

        </div>

    </section>
</div>

@endsection