<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0-alpha3/dist/css/bootstrap.min.css">

    <title>Growmodo</title>
    @routes
    <script src="{{ mix('js/app.js') }}" defer></script>
    @inertiaHead

</head>
<body>
@inertia
</body>
</html>
