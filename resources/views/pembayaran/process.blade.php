@extends('layouts.app')

@section('title', 'Proses Pembayaran')

@section('main')
<div class="main-content">
    <section class="section">
        <div class="section-header">
            <h1>Proses Pembayaran</h1>
        </div>
        <div class="section-body text-center">
            <h5>Silakan lanjutkan pembayaran Anda</h5>
            <button id="pay-button" class="btn btn-primary mt-3">Bayar Sekarang</button>
        </div>
    </section>
</div>

<script src="https://app.sandbox.midtrans.com/snap/snap.js" data-client-key="{{ env('MIDTRANS_CLIENT_KEY') }}"></script>
<script type="text/javascript">
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
