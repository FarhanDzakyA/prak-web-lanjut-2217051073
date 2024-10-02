<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title><?= $title ?></title>

    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        input:-webkit-autofill,
        input:-webkit-autofill:hover,
        input:-webkit-autofill:focus,
        input:-webkit-autofill:active {
            -webkit-box-shadow: 0 0 0px 1000px black inset !important; 
            box-shadow: 0 0 0px 1000px black inset !important; 
            color: #ffffff !important;
            -webkit-text-fill-color: #ffffff;
        }
    </style>
</head>
<body>
    @yield('content')
</body>
</html>