@extends('layouts.app')

@section('title', 'Daftar Mobil Tersedia')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Daftar Mobil Tersedia</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <!-- Menampilkan daftar mobil yang tersedia -->
                    @foreach($mobils as $mobil)
                    <div class="col-md-6 col-lg-4">
                        <div class="card">
                            <!-- Menampilkan gambar mobil -->
                            <img class="card-img-top" src="{{ asset('storage/' . $mobil->image) }}" alt="{{ $mobil->nama }}">
                            <div class="card-body">
                                <!-- Menampilkan detail mobil -->
                                <h5 class="card-title">{{ $mobil->nama }}</h5>
                                <p class="card-text">Tipe: {{ $mobil->tipe }}</p>
                                <p class="card-text">Harga: Rp {{ number_format($mobil->harga, 0, ',', '.') }} /hari</p>
                                <p class="card-text">
                                    Status:
                                    @if($mobil->tersedia == '1') <!-- 1 berarti Tersedia -->
                                        <span class="badge btn-success">Tersedia</span>
                                    @else
                                        <span class="badge btn-danger">Tidak Tersedia</span>
                                    @endif
                                </p>
                                <!-- Tombol untuk melihat detail mobil -->
                                <a href="{{route('sewa.create', ['mobil' => $mobil->id])}}" class="btn btn-primary">SEWA</a>
                            </div>
                        </div>
                    </div>
                    @endforeach
                </div>
            </div>
        </section>
    </div>
@endsection
