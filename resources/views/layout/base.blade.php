<!DOCTYPE html>
<html lang="pt-BR">
    <head>
        <meta charset="UTF-8">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <meta http-equiv="X-UA-Compatible" content="ie=edge">
        <title>Teste DC</title>
        <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/css/bootstrap.min.css" rel="stylesheet" crossorigin="anonymous">
        <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.2/dist/js/bootstrap.bundle.min.js" crossorigin="anonymous" defer></script>
        <meta name="token" content="{{csrf_token()}}" />
        @vite([
            'resources/ts/app.ts',
        ])
    </head>
    <body>
        @includeUnless($is_login_page, 'layout.header')
        @yield('content')
        <aside id="alerts-container"></aside>
    </body>
</html>