<!DOCTYPE html>
<html lang="en">

<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <title>Instant Dr.</title>
    @include('admin.partial.css')
    @yield('css')
</head>
<body>
    <div class="container-scroller">
        <!-- partial:partials/_navbar.html -->
        @include('admin.partial.navbar')
        <!-- partial -->
        <div class="container-fluid page-body-wrapper">
            @include('admin.partial.sidebar')

            <!-- partial -->
            <div class="main-panel">
                <div class="content-wrapper">
                    @yield('content')
                </div>
                <!-- content-wrapper ends -->
                @include('admin.partial.footer')
            </div>
            <!-- main-panel ends -->
        </div>
        <!-- page-body-wrapper ends -->
    </div>
    <!-- container-scroller -->
    @include('admin.partial.js')
    @yield('script')
    <!-- End custom js for this page-->
</body>

</html>
