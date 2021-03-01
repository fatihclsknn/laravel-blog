<!DOCTYPE html>
<html class="no-js" lang="en">
<head>

    <!--- basic page needs
    ================================================== -->
    <meta charset="utf-8">
    <title>@yield('title',config('app.name'))</title>
    <meta name="description" content="">
    <meta name="author" content="">

    <!-- mobile specific metas
     ================================================== -->
    <meta name="viewport" content="width=device-width, initial-scale=1">

           @include('front.layouts.inc.head')

</head>

<body id="top">
@include('front.layouts.inc.navbar')


@yield('content')

@include('front.layouts.inc.footer')

@include('front.layouts.inc.footer-script')


</body>

</html>
