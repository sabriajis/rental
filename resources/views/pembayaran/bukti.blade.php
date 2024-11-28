@extends('layouts.app')

@section('title', 'Bukti Pembayaran')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Bukti Pembayaran</h1>
        </div>
        <div class="section-body">
            <div class="row justify-content-center">
                <div class="col-md-6 col-lg-4">
                    <div class="card shadow-lg border-0 rounded" style="border: 2px solid #dee2e6;">
                        <div class="card-body">
                            <div class="text-center mb-4">
                                <h3 class="text-primary">Bukti Pembayaran</h3>
                                <hr>
                            </div>

                            <!-- Informasi Pemesan -->

                            <div class="mb-3">
                                <p><strong>Nama Pemesan:</strong> {{ $sewa->user->name }}</p>
                                <p><strong>Alamat:</strong> {{ $sewa->alamat }}</p>
                            </div>

                            <!-- Detail Pembayaran -->
                            <div class="mb-3">
                                <p><strong>Status Pembayaran:</strong> <span class="badge bg-success">{{ $sewa->status }}</span></p>
                                <p><strong>Order ID:</strong> {{ $sewa->id }}</p>
                                <p><strong>Total Pembayaran:</strong> Rp {{ $sewa->total }}</p>
                            </div>

                            <!-- Informasi Mobil yang Dipesan -->
                            <div class="mb-3">
                                <p><strong>Mobil yang Dipesan:</strong> {{ $sewa->mobil->nama }}</p>
                                <p><strong>Harga Sewa:</strong> Rp {{ number_format($sewa->mobil->harga) }} /hari</p>
                                <div class="text-center">
                                    <img src="{{ asset('storage/' . $sewa->mobil->image) }}" alt="Mobil" class="img-fluid" style="max-width: 100%; height: auto;">
                                </div>
                            </div>

                            <hr>

                            <div class="text-center mt-4">
                                <p class="small text-muted">Terima kasih telah melakukan pembayaran.</p>
                            </div>

                            <!-- Kembali ke Halaman Utama -->
                            <div class="d-flex justify-content-center mt-5">
                                <a href="{{ route('home') }}" class="btn btn-primary btn-lg w-100">Kembali ke Halaman Utama</a>
                            </div>

                            <!-- Print Button -->
                            <div class="d-flex justify-content-center mt-3">
                                <button onclick="window.print()" class="btn btn-secondary btn-lg w-100">Cetak Bukti Pembayaran</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

@section('style')
<style>
    .main-content {
        background-color: #f8f9fa;
        padding-top: 20px;
    }

    .section-header h1 {
        font-size: 2.5rem;
        color: #007bff;
    }

    .card {
        border-radius: 8px;
        box-shadow: 0 4px 10px rgba(0, 0, 0, 0.1);
        font-family: 'Courier New', Courier, monospace;
    }

    .card-body {
        padding: 2rem;
    }

    .card-title {
        font-size: 1.25rem;
        color: #007bff;
    }

    .text-primary {
        color: #007bff;
    }

    .badge.bg-success {
        font-size: 1rem;
        font-weight: bold;
    }

    .btn-primary {
        background-color: #007bff;
        border: none;
        padding: 10px 20px;
        font-size: 1.1rem;
    }

    .btn-primary:hover {
        background-color: #0056b3;
    }

    .btn-secondary {
        background-color: #6c757d;
        border: none;
        padding: 10px 20px;
        font-size: 1.1rem;
    }

    .btn-secondary:hover {
        background-color: #5a6268;
    }

    .card-body p {
        font-size: 1rem;
        line-height: 1.5;
    }

    hr {
        border: 1px solid #dee2e6;
    }

    .small {
        font-size: 0.875rem;
    }

    /* Styling for print */
    @media print {
        /* Hide everything except the payment details */
        .main-content {
            padding-top: 0;
            background-color: white;
        }

        .section-header, .btn, .d-flex.justify-content-center, .small {
            display: none; /* Hide section header, buttons, and small text */
        }

        .card {
            border-radius: 0;
            box-shadow: none;
            border: none;
        }

        .card-body {
            padding: 1.5rem;
        }

        .text-muted {
            color: #6c757d;
        }

        hr {
            border: 1px solid #000;
        }

        img {
            max-width: 100%;
            height: auto;
        }
    }
</style>
@endsection
@endsection
