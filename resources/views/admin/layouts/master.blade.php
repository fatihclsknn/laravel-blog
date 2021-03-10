<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>@yield('title',config('app.name'))</title>
    @include('admin.layouts.inc.head')
</head>
<body id="page-top">
<div id="wrapper">
    @include('admin.layouts.inc.sidebar')
    <div id="content-wrapper" class="d-flex flex-column">
        <div id="content">
            @include('admin.layouts.inc.topbar')
            @yield('content')

        </div>

        @include('admin.layouts.inc.footer')
    </div>
    <!-- End of Content Wrapper -->

</div>

@include('admin.layouts.inc.footer-script')
</body>

</html>
