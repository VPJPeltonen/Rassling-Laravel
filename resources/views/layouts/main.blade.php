<!DOCTYPE html>
<html>
<head>
  <title>Rassler</title>
  @include('layouts.style')
</head>
<body>
  <div id='navi'>
    @include('layouts.navbar')
  </div>
  <div id='content'>
    @yield('content')
  </div>
  <div id='footer'>
    @include('layouts.footer')
  </div>
</body>
</html>
