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
                <div class="row mt-3">
                    @foreach ($product as $item)
                    <div class="col-md-4 mb-3">
                        <div class="card">
                            <div class="card-image">
                                {{-- <img class="img img-thumbnail" src="https://cdn.idntimes.com/content-images/community/2019/06/duren-sawit-kuliner-6-bakso-dan-mie-ayam-favorioriginal-c44a0544fb0c5cc279fb6df2aaa66566_600x400.jpg" alt=""> --}}
                                <img class="img img-thumbnail" src="{{asset($item->images)}}" alt="">
                            </div>
                            <div class="card-body">
                                <h2 class="h5">
                                    {{$item->name}}
                                </h2>
                                <p>
                                    {!!Str::limit($item->description,50)!!}
                                </p>
                            </div>
                            <div class="card-footer d-flex justify-content-between align-items-center">
                                <h3 class="h5">
                                    @currency($item->price)
                                </h3>
                                <div>
                                    <a href="/seller/product/{{$item->slug}}/edit" class="btn btn-sm btn-info">
                                        <i class="fa fa-xs fa-pen"></i>
                                        Ubah
                                    </a>
                                    <form action="/seller/product/{{$item->slug}}" method="post" class="d-inline">
                                        @csrf
                                        @method('DELETE')
                                        <button onclick="return confirm('Apakah Anda yakin ingin menghapusnya?')" type="sumit" class="btn btn-sm btn-danger">
                                            <i class="fa fa-xs fa-trash"></i>
                                            Hapus
                                        </button>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                    @endforeach
                    <div class="clearfix"></div>
                    <div class="col-md-6 mx-auto">
                        <div class="d-flex justify-content-center">
                            {{$product->render()}}
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
        </script>
    @endif
@endsection
