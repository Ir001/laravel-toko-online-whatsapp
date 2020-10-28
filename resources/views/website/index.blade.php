@extends('website.master')
@section('title', 'Landing Page')
@section('content')
<div class="header bg-light">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12 py-5">
                <h1>{{config('app.name')}}</h1>
                <p class="text-secondary">
                    <b>Toko Online WhatsApp</b> adalah marketplace yang memudahkan Anda membeli produk atau jasa
                    dengan memanfaatkan aplikasi WhatsApp.

                </p>
                <a href="#" class="btn btn-outline-success">
                    Cari Produk
                </a>
                <a href="#" class="btn btn-success">
                    Daftar
                </a>
            </div>
        </div>
    </div>
</div>
<div class="product-section">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-12">
                <h2>Produk Terbaru</h2>
            </div>
        </div>
    </div>
</div>

@endsection
