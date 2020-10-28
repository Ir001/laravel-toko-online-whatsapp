<div class="list-group">
    <a href="{{route('seller.dashboard')}}" class="list-group-item{{Route::is('seller.dashboard') ? ' active' : ''}}">Dashboard</a>
    <a href="{{route('seller.product')}}" class="list-group-item{{Route::is('seller.product') ? ' active' : ''}}">Product</a>
    <a href="{{route('seller.profile')}}" class="list-group-item{{Route::is('seller.profile') ? ' active' : ''}}">Profile</a>
    <a href="{{route('seller.setting')}}" class="list-group-item{{Route::is('seller.setting') ? ' active' : ''}}">Setting</a>
</div>
