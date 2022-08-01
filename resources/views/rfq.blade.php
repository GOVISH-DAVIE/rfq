<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>RFQ</title>

    <!-- Fonts -->

    <script src="{{ asset('js/app.js') }}" defer></script>
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/css/bootstrap.min.css"
        integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">

    <style>
        body {
            font-family: 'Nunito', sans-serif;
            background-color: #424769
        }
    </style>
</head>

<body class="antialiased">
    <div class='container'>
        <nav class="navbar navbar-light bg-transparent">
            <span class="navbar-brand mb-0 h1"><img
                    src="https://m-jenzi.com/wp-content/uploads/2022/05/logo-top-final-1.png" height='60'></span>

            <a href="https://m-jenzi.com/" class="btn btn-outline-primary">Back Home</a>
        </nav>

    </div>
    <br>
    <div class="container">
        <div class="row">
            @foreach ($rfqs as $it)
                <div class="card m-1">

                    <img class="card-img-top" src="/storage/image/{{ $it->img }}" alt="{{ $it->img }}">
                    <div class="card-body">
                        <i>
                            <h5 class="card-title">Item Name{{ $it->name }}</h5>
                        </i>
                        <i>
                            <h5 class="card-title">Quantity {{ $it->quantity }}</h5>
                        </i>
                        {{-- <p class="card-text">{{ $item->des }}</p> --}}
                        <i>
                            Min Budget: {{ $it->mb }}
                            |
                            Max Budget: {{ $it->mxb }}
                        </i>


                        <div class="input-group mb-3">
                             <div class="input-group-append">
                                <a href="/item/{{$it->id}}" class="btn btn-outline-secondary">View</a>
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        </div>
    </div>

</body>

</html>
