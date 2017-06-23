<!DOCTYPE html>
<html>
    @include('partials.berita.style')
<body>

<div class="body">
    @include('partials.berita.header')

    @yield('content')

    @include('partials.berita.footer')
</div>
    @include('partials.berita.script')
</body>
</html>
