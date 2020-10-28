@extends('website.master')
@section('title', 'Landing Page')
@section('content')
<div class="login-section">
    <div class="container py-5">
        <div class="row">
            <div class="col-md-8 d-none d-md-block">
                <h2>Login</h2>
                <p>Lorem ipsum dolor sit amet consectetur adipisicing elit. Dolor quo sunt eos ab voluptas quas unde sit provident non rerum commodi officia et hic, veniam eum. Ab minima aliquam impedit! Fugiat itaque laboriosam expedita at laborum, ipsa omnis nulla officiis quas eos vel laudantium quidem natus dolore ducimus nemo? Corporis architecto facere debitis consectetur voluptatem cumque harum, facilis, blanditiis excepturi quae maxime minus doloremque doloribus! Sapiente necessitatibus est ratione. Explicabo delectus magnam minus expedita optio debitis maiores fugiat ducimus temporibus!</p>
            </div>
            <div class="col-md-4">
                <div class="card">
                    <div class="card-header">
                        <h2 class="h5 card-title">Masuk sebagai Penjual</h2>
                    </div>
                    <div class="card-body">
                        @if (session()->has('errors'))
                            @foreach (json_decode(session()->get('errors'),1) as $item)
                            <p class="alert alert-danger">
                                {!!$item[0]!!}
                            </p>
                            @endforeach
                        @endif
                        <form action="" method="post">
                            @csrf
                            <div class="form-group">
                                <label>Email</label>
                                <input type="email" name="email" class="form-control" placeholder="Masukan Email Anda" required>
                            </div>
                            <div class="form-group">
                                <label>Kata Sandi</label>
                                <input type="password" name="password" class="form-control" placeholder="Masukan Kata Sandi Anda" required>
                            </div>
                            <div class="form-group">
                                <p class="small">
                                    Belum punya akun? <a href="/seller/register">Daftar</a>.
                                </p>
                                <div class="d-flex justify-content-end align-items-center">
                                    <a href="/" class="small mr-auto"><i class="fa fa-xs fa-arrow-left"></i> Kembali</a>
                                    <button type="submit" class="btn btn-success">
                                        <i class="fa fa-sm fa-sign-in-alt"></i> Masuk
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
