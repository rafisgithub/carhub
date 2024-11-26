<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <link rel="stylesheet" href="{{ asset('frontend/assets/css/bootstrap.min.css') }}">
</head>
<body>
    <h1>Congratulations! You are the winner of the auction!</h1>
    <p>Dear {{ $user->name }} </p>

    <img src="{{ asset( $car_info->thumbail ) }}" alt="">



    <a class="btn btn-primary" href="{{ route('car.details', ['id' => $car_info->id]) }}">See Details</a>

    <script src="{{ asset('frontend/assets/js/jquery-3.7.1.min.js') }}"></script>
</body>
</html>
