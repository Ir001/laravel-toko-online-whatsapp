@extends('website.master')
@section('title', 'Landing Page')
@section('content')
<div class="dashboard-section">
    <div class="container py-5">
        @if (auth('seller')->user()->email_verified_at == null)
        <p class="mt-md-0 mt-3 alert alert-danger d-md-flex justify-content-between align-items-center">
            <span>Harap konfirmasi alamat email terlebih dahulu.</span>
            <a href="" class="btn btn-sm btn-primary">
                <i class="fa fa-sm fa-sync"></i> Kirim Ulang Email
            </a>
        </p>
        @endif
        <div class="row">
            <div class="col-md-2">
                @include('website.seller.layouts.menu')
            </div>
            <div class="col-md-10">
                <div class="d-flex justify-content-between align-items-center">
                    <h1 class="h3">
                        Daftar Produk
                    </h1>
                    <a href="{{route('seller.product.create')}}" class="btn btn-sm btn-primary">
                        <i class="fa fa-xs fa-plus"></i> Tambah Produk
                    </a>
                </div>
                <div class="row">
                    <div class="col-md-4">
                        <div class="card">
                            <div class="card-image">
                                <img class="img img-thumbnail" src="https://cdn.idntimes.com/content-images/community/2019/06/duren-sawit-kuliner-6-bakso-dan-mie-ayam-favorioriginal-c44a0544fb0c5cc279fb6df2aaa66566_600x400.jpg" alt="">
                            </div>
                            <div class="card-body">
                                <h2 class="h5">
                                    Bakso Mang Oleh
                                </h2>
                                <p>
                                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Hic, at?...
                                </p>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <h3 class="h5">
                                    Rp. 10.000
                                </h3>
                                <div>
                                    <a href="" class="btn btn-sm btn-info">
                                        <i class="fa fa-xs fa-pen"></i>
                                        Ubah
                                    </a>
                                    <a href="" class="btn btn-sm btn-danger">
                                        <i class="fa fa-xs fa-trash"></i>
                                        Hapus
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('js')
    @if (session()->has('success'))
        <script>
            Swal.fire({
                icon:'success',
                title:'Berhasil',
                text:"{{session()->get('success')}}",
            });
            setTimeout(function(){
                window.location.href="/seller/login";
            },1200);
        </script>
    @endif
@endsection
