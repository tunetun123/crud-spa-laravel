@extends('layout.main')

@section('content')
<div class="px-4 py-5 my-5 text-center">
    <img class="d-block mx-auto mb-4 rounded-circle" src="{{ asset('asset/img/profile.jpeg') }}" alt="" width="150" height="140">
    <h1 class="display-5 fw-bold text-body-emphasis">Selamat Datang</h1>
    <div class="col-lg-6 mx-auto">
        <p class="lead mb-4">Berikut ini adalah demo CRUD data penjualan produk sepatu. <br>Klik tombol di bawah ini untuk memulai</p>
        <div class="d-grid gap-2 d-sm-flex justify-content-sm-center">
            <a class="btn btn-primary btn-lg px-4 gap-3" href="/penjualan">Mulai Demo</a>
        </div>
    </div>
</div>
@endsection
