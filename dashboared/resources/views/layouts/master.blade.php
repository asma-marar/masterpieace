<!DOCTYPE html>
<html lang="en">
@include('inc.admin-head')


<body>
<div class="wrapper">
    @include('inc.admin-sidebar')
    <div class="main-panel">
        <div class="main-header">
            @include('inc.admin-logo')

            @include('inc.admin-navbar')
        </div>

        <div class="container">
            <div class="page-inner">
                <div class="page-header">
                    <h3 class="fw-bold mb-3">@yield('title')</h3>
                    <ul class="breadcrumbs mb-3">
                    <li class="nav-home">
                        <a href="#">
                        <i class="icon-home"></i>
                        </a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">@yield('title')</a>
                    </li>
                    <li class="separator">
                        <i class="icon-arrow-right"></i>
                    </li>
                    <li class="nav-item">
                        <a href="#">@yield('name')</a>
                    </li>
                    </ul>                    
                </div>
                @yield('content')

            </div>
        </div>

        @include('inc.admin-footer')

            
    </div>       
</div>
@include('inc.admin-script')
</body>

</html>