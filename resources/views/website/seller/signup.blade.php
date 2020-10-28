@extends('website.master')
@section('title', 'Landing Page')
@section('content')
<div class="login-section">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 d-none d-md-block">
                <h2>Daftar</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor quo sunt eos ab voluptas quas unde sit provident non rerum commodi officia et hic, veniam eum. Ab minima aliquam impedit! Fugiat itaque laboriosam expedita at laborum, ipsa omnis nulla officiis quas eos vel laudantium quidem natus dolore ducimus nemo? Corporis architecto facere debitis consectetur voluptatem cumque harum, facilis, blanditiis excepturi quae maxime minus doloremque doloribus! Sapiente necessitatibus est ratione. Explicabo delectus magnam minus expedita optio debitis maiores fugiat ducimus temporibus!</p>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="h5 card-title">Daftar sebagai Penjual</h2>
                    </div>
                    <div class="card-body">
                        @if (session()->has('errors'))
                            @foreach (json_decode(session()->get('errors'),1) as $item)
                            <p class="alert alert-danger">
                                <i class="fa fa-xs fa-info-circle"></i>
                                    {!!$item[0]!!}
                            </p>
                            @endforeach
                        @endif
                        <form action="/seller/register" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Nama Toko</label>
                                <input type="text" name="name" value="{{old('name')}}" class="form-control" placeholder="Masukan Nama Toko Anda" required>
                            </div>
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" value="{{old('email')}}" class="form-control" placeholder="Masukan Email Anda" required>
                            </div>
                            <div class="form-group">
                                <label>Kata Sandi</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukan Kata Sandi Anda" required>
                            </div>
                            <div class="form-group">
                                <label>Konfirmasi Kata Sandi</label>
                                <input type="password" name="password_confirmation" class="form-control" placeholder="Konfirmasi Kata Sandi Anda" required>
                            </div>
                            <div class="form-group">
                                <label for="aggree" class="small">
                                    <input type="checkbox" name="aggree" class="form-checkbox" id="aggree">
                                    Dengan mendaftar, saya menyetujui <a href="">S&K</a> yang berlaku.
                                </label>
                                <p class="small">
                                    Sudah punya akun? <a href="/seller/login">Masuk</a>.
                                </p>
                                <div class="d-flex justify-content-end align-items-center">
                                    <a href="/" class="small mr-auto"><i class="fa fa-xs fa-arrow-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-success">
                                        Daftar
                                    </button>
                                </div>
                            </div>
                        </form>
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
