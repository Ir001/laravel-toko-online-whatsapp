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
                <div class="card">
                    <div class="card-header">
                        <h1 class="card-title h5">
                            Tambah Produk
                        </h1>
                    </div>

                    <div class="card-body">
                        @if (session()->has('errors'))
                            @foreach (json_decode(session()->get('errors'),1) as $item)
                            <p class="alert alert-danger alert-dismissible fade show" role="alert">
                                {!!$item[0]!!}
                                <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                    <span aria-hidden="true">&times;</span>
                                </button>
                            </p>
                            @endforeach
                        @endif
                        <form action="{{route('seller.product.store')}}" enctype="multipart/form-data" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nama Produk <small class="text-danger">*</small></label>
                                <input type="text" name="name" value="{{old('name')}}" placeholder="Nama Produk. cth: Bakso Ekstra Pedas" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Foto Produk</label>
                                <input type="file" name="foto" value="{{old('file')}}" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Harga Satuan Produk <small class="text-danger">*</small></label>
                                <input type="number" name="price" value="{{old('price')}}" placeholder="Harga Produk. cth: 10000" class="form-control">
                            </div>
                            <div class="form-group">
                                <label>Kategori Produk <small class="text-danger">*</small></label>
                                <select name="category_id" class="form-control">
                                    <option hidden>Pilih Kategori Produk Anda</option>
                                    <option value="1">Makanan/Minuman</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Tags</label>
                                <select name="tags[]" class="form-control" multiple>
                                    <option hidden>Tag</option>
                                    <option value="1">Makanan/Minuman</option>
                                    <option value="2">Murah</option>
                                    <option value="3">Berkualitas</option>
                                </select>
                            </div>
                            <div class="form-group">
                                <label>Deskripsi Produk <small class="text-danger">*</small></label>
                                <textarea name="description" id="description" class="form-control" rows="5"></textarea>
                            </div>
                            <div class="form-group d-flex justify-content-between align-items-center">
                                <a href="{{route('seller.product')}}" class="small">
                                    Kembali
                                </a>
                                <button type="submit" class="btn btn-sm btn-info">
                                    Tambah Produk
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@endsection
@section('css')
<link href="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.css" rel="stylesheet">
@endsection
@section('js')
<script src="https://cdn.jsdelivr.net/npm/summernote@0.8.18/dist/summernote.min.js"></script>
<script>
    $('#description').summernote({
        placeholder : 'Tuliskan deskripsi produk Anda',
        height: 150
    });
    var descriptionHTML = '{{old('description')}}';
    $('#description').summernote('code', descriptionHTML);
</script>
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
