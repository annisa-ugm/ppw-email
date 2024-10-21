<html>
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width,
        initial-scale=1">
        <title>Perpustakaan</title>
    </head>
    <body>
        @yield('content')
        <script type="text/javascript">
        $('.date').datepicker({
            format: 'yyyy-mm-dd'
            autoclose: 'true'
        });
        </script>
    </body>
</html>

