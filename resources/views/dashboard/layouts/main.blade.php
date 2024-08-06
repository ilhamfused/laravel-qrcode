<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Dashboard</title>
    <link rel="stylesheet" href="/assets/extensions/choices.js/public/assets/styles/choices.css">
    <link rel="stylesheet" href="/assets/css/main/app.css">
    <link rel="stylesheet" href="/assets/css/main/app-dark.css">
    <link rel="stylesheet" href="/assets/css/my-style.css">
    <link rel="stylesheet" href="/assets/extensions/sweetalert2/sweetalert2.min.css">
    <link rel="stylesheet" href="assets/extensions/simple-datatables/style.css">
    <link rel="stylesheet" href="assets/css/pages/simple-datatables.css">
    <link rel="shortcut icon" href="/assets/images/lokers/logo-only.svg" type="image/x-icon">
    <link rel="shortcut icon" href="/assets/images/lokers/logo-only.svg" type="image/png">
    <script type="text/javascript" src="/assets/js/instascan.min.js"></script>
</head>

<body>
    <div id="app">
        @include('dashboard.layouts.sidebar')
        <div id="main" class='layout-navbar'>
            @include('dashboard.layouts.header')
            @yield('container')
        </div>
    </div>
    <script src="/assets/extensions/jquery/jquery.slim.min.js"></script>
    <script src="/assets/js/bootstrap.js"></script>
    <script src="/assets/js/app.js"></script>
    <script src="/assets/extensions/choices.js/public/assets/scripts/choices.js"></script>
    <script src="/assets/js/pages/form-element-select.js"></script>
    <script src="/assets/extensions/sweetalert2/sweetalert2.min.js"></script>
    <script src="assets/extensions/simple-datatables/umd/simple-datatables.js"></script>
    <script src="assets/js/pages/simple-datatables.js"></script>
    <script src="/assets/js/myswal.js"></script>
    <script src="/assets/js/myscript.js"></script>
</body>

</html>
