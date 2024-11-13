<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Crud Management</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/css/bootstrap.min.css" rel="stylesheet"/>
    <link rel="stylesheet" href="{{asset('css/customstyle.css')}}">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.2/dist/js/bootstrap.bundle.min.js" defer></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js" defer></script>
    <script src="{{ asset('js/validationUserProfile.js') }}" defer></script>
    <script src="{{ asset('js/imagePreview.js') }}" defer></script>
   
</head>
<body>
    {{ $slot }}
</body>
</html>