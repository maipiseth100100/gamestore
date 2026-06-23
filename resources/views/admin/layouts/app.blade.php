<!DOCTYPE html>
<html lang="en">

<head>

    <meta charset="UTF-8">

    <meta name="viewport"
          content="width=device-width, initial-scale=1.0">

    <title>Game Store Admin</title>

    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/css/bootstrap.min.css"
          rel="stylesheet">

    <link rel="stylesheet"
          href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.2/css/all.min.css">

    <style>

        body{
            background:#f1f5f9;
            font-family:Inter,sans-serif;
            overflow-x:hidden;
        }

        .main-content{
            margin-left:260px;
            min-height:100vh;
        }

        .page-content{
            padding:25px;
        }

    </style>

    @stack('styles')

</head>

<body>

    @include('admin.layouts.sidebar')

    <div class="main-content">

        @include('admin.layouts.navbar')

        <div class="page-content">

            @yield('content')

        </div>

        @include('admin.layouts.footer')

    </div>

<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.3/dist/js/bootstrap.bundle.min.js"></script>

</body>
</html>