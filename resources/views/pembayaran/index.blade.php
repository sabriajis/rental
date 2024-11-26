@extends('layouts.app')

@section('title', 'Konfirmasi Pembayaran')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Konfirmasi Pembayaran</h1>
        </div>
        <div class="section-body">
            <div class="row">
                <div class="col-md-8 offset-md-2">
                    <div class="card">
                        <div class="card-body">
                            <!-- Menampilkan detail sewa -->
                            <h5 class="card-title">Detail Sewa</h5>
                            @if(isset($sewa) && isset($sewa->mobil))
                                <p><strong>Nama Mobil:</strong> {{ $sewa->mobil->nama }}</p>
                                <p><strong>Tipe Mobil:</strong> {{ $sewa->mobil->tipe }}</p>
                                <p><strong>Durasi Sewa:</strong> {{ $sewa->durasi }} hari</p>
                                <p><strong>Total Harga:</strong> Rp {{ number_format($sewa->total, 0, ',', '.') }}</p>
                                <p><strong>Nama Penyewa:</strong> {{ $sewa->nama }}</p>
                                <p><strong>Email:</strong> {{ $sewa->email }}</p>
                                <p><strong>No. Telepon:</strong> {{ $sewa->phone }}</p>
                                <p><strong>Alamat:</strong> {{ $sewa->alamat }}</p>
                            @else
                                <p class="text-danger">Detail sewa tidak tersedia.</p>
                            @endif
                        </div>
                    </div>


                        <!-- Form untuk proses ke pembayaran -->
                        <form action="{{ route('pembayaran.process') }}" method="POST">
                            @csrf
                            <input type="hidden" name="sewa_id" value="{{ $sewa->id }}">
                            <button type="submit" class="btn btn-primary btn-block mt-3">Bayar Sekarang</button>
                        </form>
{{--
                        <p class="text-center text-danger mt-3">Pembayaran tidak dapat dilanjutkan karena data tidak lengkap.</p> --}}


                    <!-- Tombol kembali -->
                    <a href="{{ url()->previous() }}" class="btn btn-secondary btn-block mt-3">Kembali</a>
                </div>
            </div>
        </div>
    </section>
</div>
@endsection
