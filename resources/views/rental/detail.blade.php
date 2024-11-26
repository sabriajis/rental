@extends('layouts.app')

@section('title', 'Detail Mobil')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Detail Mobil</h1>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Rental Mobil</a></div>
                    <div class="breadcrumb-item">Detail Mobil</div>
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
                                <h4>Informasi Mobil</h4>
                            </div>
                            <div class="card-body">
                                <div class="row">
                                    <div class="col-md-6">
                                        <h5>Nama Mobil</h5>
                                        <p>{{ $mobil->nama }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Tipe Mobil</h5>
                                        <p>{{ $mobil->tipe }}</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Harga Sewa</h5>
                                        <p>Rp {{ number_format($mobil->harga, 0, ',', '.') }} per hari</p>
                                    </div>
                                    <div class="col-md-6">
                                        <h5>Status</h5>
                                        <span class="btn btn-sm
                                            @if($mobil->tersedia) btn-success
                                            @else btn-danger
                                            @endif
                                            btn-icon text-center" style="width: 100px; border-radius: 20px;">
                                            @if($mobil->tersedia) Tersedia @else Tidak Tersedia @endif
                                        </span>
                                    </div>
                                    <div class="col-md-12 mt-3">
                                        <h5>Deskripsi Mobil</h5>
                                        <p>{{ $mobil->deskripsi ?? 'Tidak ada deskripsi untuk mobil ini.' }}</p>
                                    </div>
                                </div>

                                @if($mobil->tersedia)
                                    <div class="row mt-4">
                                        <div class="col-12">
                                            <h4>Penyewaan Mobil</h4>
                                            <form action="{{ route('rental.sewa', $mobil->id) }}" method="POST">
                                                @csrf

                                                <div class="form-group">
                                                    <label for="tanggal_sewa">Tanggal Sewa</label>
                                                    <input type="date" class="form-control" id="tanggal_sewa" name="tanggal_sewa" required>
                                                </div>

                                                <div class="form-group">
                                                    <label for="durasi_sewa">Durasi Sewa (Hari)</label>
                                                    <input type="number" class="form-control" id="durasi_sewa" name="durasi_sewa" min="1" required>
                                                </div>

                                                <div class="form-group">
                                                    <button type="submit" class="btn btn-primary">Sewa Mobil</button>
                                                </div>
                                            </form>
                                        </div>
                                    </div>
                                @else
                                    <div class="alert alert-danger mt-4">
                                        Mobil ini tidak tersedia untuk disewa saat ini.
                                    </div>
                                @endif
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
