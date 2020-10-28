<nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
    <div class="container">
        <a class="navbar-brand" href="#">Toko <span class="text-success">WhatsApp <i class="fab fa-fw fa-whatsapp"></i></span></a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarsExampleDefault" aria-controls="navbarsExampleDefault" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
        </button>

        <div class="collapse navbar-collapse" id="navbarsExampleDefault">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="#">Beranda <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="#">Produk Populer</a>
            </li>
            <form action="" method="GET" class="form-inline my-2 my-lg-0">
                <input class="form-control form-control-sm mr-sm-2" type="text" placeholder="Cari Produk" aria-label="Cari">
                <button class="btn btn-sm btn-outline-success my-2 my-sm-0" type="submit"><i class="fa fa-sm fa-search"></i></button>
            </form>
        </ul>
        <ul class="navbar-nav ml-auto">
            @guest
            <li class="nav-item">
                <a class="nav-link" href="#"><i class="fa fa-user-plus fa-sm"></i> Daftar</a>
            </li>
            <li class="nav-item dropdown">
                <a class="nav-link dropdown-toggle" href="#" id="dropdown01" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false"><i class="fa fa-sm fa-sign-in-alt"></i> Masuk</a>
                <div class="dropdown-menu" aria-labelledby="dropdown01">
                <a class="dropdown-item" href="/buyer/login">Pembeli</a>
                <a class="dropdown-item" href="/seller/login">Penjual</a>
                </div>
            </li>
            @endguest
            @if (auth('seller')->check())
            <li class="nav-item">
                <a class="nav-link" href="{{route('seller.logout')}}"><i class="fa fa-sm fa-sign-out-alt"></i> Keluar</a>
            </li>
            @endif
            @if (auth('buyer')->check())
            <li class="nav-item">
                <a class="nav-link" href="{{route('logout')}}"><i class="fa fa-sm fa-sign-out-alt"></i> Keluar</a>
            </li>
            @endif

        </ul>

        </div>
    </div>
</nav>
