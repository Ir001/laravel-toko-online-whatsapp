@extends('website.master')
@section('title', 'Landing Page')
@section('content')
<div class="dashboard-section">
    <div class="container py-5">
        @if (auth('seller')->user()->email_verified_at == null)
        <p class="alert alert-danger d-md-flex justify-content-between align-items-center">
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
                <h1 class="h3">
                    Selamat Datang, Admin {{auth('seller')->user()->name}}
                </h1>
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
