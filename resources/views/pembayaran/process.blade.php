@extends('layouts.app')

@section('title', 'Proses Pembayaran')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Proses Pembayaran</h1>
        </div>
        <div class="section-body text-center">
            <!-- Tampilkan detail sewa -->
            <h5>Silakan lanjutkan pembayaran Anda</h5>
            <div class="payment-details mt-4">
                <p><strong>Mobil:</strong> {{ $sewa->mobil->nama}}</p> <!-- Menampilkan nama mobil -->
                <p><strong>Total Pembayaran:</strong> {{ $sewa->total }}</p> <!-- Menampilkan total pembayaran -->
                <p><strong>Durasi Sewa:</strong> {{ $sewa->durasi }} hari</p> <!-- Menampilkan durasi sewa -->

                <!-- Tampilkan tombol pembayaran -->
                <button id="pay-button" class="btn btn-primary mt-3">Bayar Sekarang</button>
            </div>
        </div>
    </section>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
    // Menangani klik tombol bayar
    document.getElementById('pay-button').onclick = function () {
        snap.pay('{{ $snapToken }}', {
            onSuccess: function (result) {
                alert('Pembayaran berhasil');
                // Redirect ke halaman bukti pembayaran setelah pembayaran sukses
                window.location.href = '{{ route('notification', ['sewa' => $sewa->id]) }}';
            },
            onPending: function (result) {
                alert('Pembayaran pending');
                location.reload();
            },
            onError: function (result) {
                alert('Pembayaran gagal');
                location.reload();
            },
        });
    };
</script>
@endsection
