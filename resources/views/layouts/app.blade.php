<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>CRM System</title>
    <link rel="stylesheet" href="{{ asset('css/app.css') }}">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.4/css/all.min.css" rel="stylesheet">
</head>

<body>
    <div class="container-fluid">
        <header class="py-3 bg-dark text-white text-center">
            <h1>CRM System</h1>
        </header>
        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>

</html>