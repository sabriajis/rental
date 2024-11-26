@extends('layouts.app')

@section('title', 'Edit Mobil')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Edit Mobil</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Rental Mobil</a></div>
                    <div class="breadcrumb-item">Edit Mobil</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Form Edit Mobil</h4>
                            </div>
                            <div class="card-body">
                                <form action="{{ route('rental.update', $mobil->id) }}" method="POST" enctype="multipart/form-data">
                                    @csrf
                                    @method('PUT')

                                    <div class="form-group">
                                        <label for="nama">Nama Mobil</label>
                                        <input type="text" class="form-control" id="nama" name="nama" required value="{{ old('nama', $mobil->nama) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="tipe">Tipe Mobil</label>
                                        <input type="text" class="form-control" id="tipe" name="tipe" required value="{{ old('tipe', $mobil->tipe) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="harga">Harga</label>
                                        <input type="number" class="form-control" id="harga" name="harga" required value="{{ old('harga', $mobil->harga) }}">
                                    </div>

                                    <div class="form-group">
                                        <label for="tersedia">Status Ketersediaan</label>
                                        <select class="form-control selectric" id="tersedia" name="tersedia">
                                            <option value="1" {{ old('tersedia', $mobil->tersedia) == '1' ? 'selected' : '' }}>Tersedia</option>
                                            <option value="0" {{ old('tersedia', $mobil->tersedia) == '0' ? 'selected' : '' }}>Tidak Tersedia</option>
                                        </select>
                                    </div>

                                    <div class="form-group">
                                        <label for="image">Gambar Mobil</label>
                                        <input type="file" class="form-control" id="image" name="image">
                                        @if ($mobil->image)
                                            <div class="mt-2">
                                                <strong>Gambar saat ini:</strong>
                                                <img src="{{ Storage::url('images/' . $mobil->image) }}" alt="Gambar Mobil" width="150">
                                            </div>
                                        @endif
                                    </div>

                                    <div class="form-group">
                                        <button type="submit" class="btn btn-primary">Simpan Perubahan</button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection

@push('scripts')
    <!-- JS Libraries -->
    <script src="{{ asset('library/selectric/public/jquery.selectric.min.js') }}"></script>

    <!-- Page Specific JS File -->
    <script src="{{ asset('js/page/features-posts.js') }}"></script>
@endpush
