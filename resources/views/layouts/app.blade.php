<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <title>@yield('title', 'QR Code App')</title>

    <!-- Tailwind -->
    <script src="https://cdn.tailwindcss.com"></script>

    <!-- Custom CSS -->
    <link rel="stylesheet" href="{{ asset('css/style.css') }}">
</head>
<body>
    <nav class="navbar">
        <h1>QR Code App</h1>
        <div>
            <a href="{{ route('qr.create') }}">Create</a>
        </div>
    </nav>

    <main>
        @yield('content')
    </main>

    <!-- Accordion Script -->
    <script>
    document.addEventListener('DOMContentLoaded', function () {
      document.querySelectorAll('.accordion').forEach(function(btn){
        btn.addEventListener('click', function () {
          const panel = btn.nextElementSibling;
          const isOpen = panel.classList.contains('open');

          if (isOpen) {
            panel.classList.remove('open');
            btn.classList.remove('active');
          } else {
            panel.classList.add('open');
            btn.classList.add('active');
          }
        });
      });
    });
    </script>
</body>
</html>