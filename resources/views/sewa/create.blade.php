@extends('layouts.app')

@section('title', 'Formulir Sewa Mobil')

@section('main')
    <div class="main-content">
        <section class="section">
            <div class="section-header">
                <h1>Formulir Sewa Mobil</h1>
            </div>
            <div class="section-body">
                <div class="row">
                    <div class="col-12">
                        <div class="card">
                            <div class="card-body">
                                <form action="{{ route('sewa.store') }}" method="POST">
                                    @csrf
                                    <input type="hidden" name="mobil_id" value="{{ $mobil->id }}">
                                    <div class="form-group">
                                        <label for="durasi">Durasi Sewa (hari)</label>
                                        <input type="number" name="durasi" class="form-control" id="durasi" min="1" required>
                                    </div>
                                    <div class="form-group">
                                        <label for="nama">Nama Lengkap</label>
                                        <input type="text" name="nama" class="form-control" id="nama" value="{{ Auth::user()->name }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="email">Email</label>
                                        <input type="email" name="email" class="form-control" id="email" value="{{ Auth::user()->email }}" readonly>
                                    </div>
                                    <div class="form-group">
                                        <label for="phone">Nomor Telepon</label>
                                        <input type="text" name="phone" class="form-control" id="phone" value="{{ Auth::user()->phone }}">
                                    </div>
                                    <div class="form-group">
                                        <label for="alamat">Alamat</label>
                                        <textarea name="alamat" class="form-control" id="alamat">{{ Auth::user()->address }}</textarea>
                                    </div>
                                    <button type="submit" class="btn btn-primary">Sewa Mobil</button>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    </div>
@endsection
