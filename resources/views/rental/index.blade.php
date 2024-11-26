@extends('layouts.app')

@section('title', 'Rental Mobil')

@push('style')
    <!-- CSS Libraries -->
    <link rel="stylesheet" href="{{ asset('library/selectric/public/selectric.css') }}">
@endpush

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Rental Mobil</h1>
                <div class="section-header-button">
                    <a href="{{ route('rental.create') }}" class="btn btn-primary">Tambah Mobil Baru</a>
                </div>
                <div class="section-header-breadcrumb">
                    <div class="breadcrumb-item active"><a href="#">Dashboard</a></div>
                    <div class="breadcrumb-item"><a href="#">Rental Mobil</a></div>
                    <div class="breadcrumb-item">Semua Mobil</div>
                </div>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        @include('layouts.alert')
                    </div>
                </div>
                <h2 class="section-title">Mobil Tersedia</h2>
                <p class="section-lead">
                    Anda dapat mengelola semua mobil, seperti mengedit, menghapus, dan lainnya.
                </p>

                <div class="row mt-4">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-header">
                                <h4>Semua Mobil</h4>
                            </div>
                            <div class="card-body">
                                <div class="float-left">
                                    <select class="form-control selectric">
                                        <option>Pilih Aksi Untuk Dipilih</option>
                                        <option>Move to Draft</option>
                                        <option>Move to Pending</option>
                                        <option>Hapus Permanen</option>
                                    </select>
                                </div>
                                <div class="float-right">
                                    <form method="GET" action="{{ route('rental.index') }}">
                                        <div class="input-group">
                                            <input type="text" class="form-control" placeholder="Cari berdasarkan Nama" name="name">
                                            <div class="input-group-append">
                                                <button class="btn btn-primary"><i class="fas fa-search"></i></button>
                                            </div>
                                        </div>
                                    </form>
                                </div>

                                <div class="clearfix mb-3"></div>

                                <div class="table-responsive">
                                    <table class="table-striped table">
                                        <thead>
                                            <tr>
                                                <th>Gambar</th> <!-- Kolom Gambar -->
                                                <th>Nama Mobil</th>
                                                <th>Tipe</th>
                                                <th>Harga</th>
                                                <th>Status</th>
                                                <th>Dibuat Pada</th>
                                                <th>Aksi</th>
                                            </tr>
                                        </thead>
                                        <tbody>
                                            @foreach ($mobils as $mobil)
                                                <tr>
                                                    <td>
                                                         <!-- Menampilkan gambar mobil -->
                                                            @if($mobil->image)
                                                            <img src="{{ asset('storage/' . $mobil->image) }}" alt="Gambar Mobil" width="100">
                                                        @else
                                                            <span>Tidak ada gambar</span>
                                                        @endif
                                                    </td>
                                                    <td>{{ $mobil->nama }}</td>
                                                    <td>{{ $mobil->tipe }}</td>
                                                    <td>Rp {{ number_format($mobil->harga, 0, ',', '.') }}</td>
                                                    <td>
                                                        <span class="btn btn-sm
                                                            @if($mobil->tersedia) btn-success
                                                            @else btn-danger
                                                            @endif
                                                            btn-icon text-center" style="width: 100px; border-radius: 20px;">
                                                            @if($mobil->tersedia) Tersedia @else Tidak Tersedia @endif
                                                        </span>
                                                    </td>
                                                    <td>{{ $mobil->created_at->format('d M Y') }}</td>
                                                    <td>
                                                        <div class="d-flex justify-content-center">
                                                            <a href="{{ route('rental.edit', $mobil->id) }}" class="btn btn-sm btn-info btn-icon">
                                                                <i class="fas fa-edit"></i> Edit
                                                            </a>

                                                            <form action="{{ route('rental.destroy', $mobil->id) }}" method="POST" class="ml-2">
                                                                @csrf
                                                                @method('DELETE')
                                                                <button type="submit" class="btn btn-sm btn-danger btn-icon confirm-delete">
                                                                    <i class="fas fa-times"></i> Hapus
                                                                </button>
                                                            </form>
                                                        </div>
                                                    </td>
                                                </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>

                                <div class="float-right">
                                    {{-- {{ $mobils->withQueryString()->links() }} --}}
                                </div>
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
