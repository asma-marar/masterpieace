<div class="col-sm-12 col-lg-3 m-b-50">
    <div class="bor10 p-lr-40 p-t-30 p-b-40 m-l-0-sm">
        <h4 class="mtext-109 cl2 p-b-30">My Account</h4>
        <nav class="nav flex-column">
            <a class="nav-link dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 {{ Request::is('user/profile') ? 'active' : '' }}" href="{{ route('user.profile') }}">
                <i class="zmdi zmdi-account m-r-10"></i> Profile
            </a>
            <a class="nav-link dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 {{ Request::is('user/profile/add') ? 'active' : '' }}" href="{{ route('user.profile.add') }}">
                <i class="zmdi zmdi-shopping-cart m-r-10"></i> Add Product
            </a>
            <a class="nav-link dis-block stext-115 cl6 hov-cl1 trans-04 p-tb-8 {{ Request::is('user/order/show') ? 'active' : '' }}" href="{{ route('user.orders.show') }}">
                <i class="zmdi zmdi-time m-r-10"></i> Order History
            </a>
        </nav>
    </div>
</div>