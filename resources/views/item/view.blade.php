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
    <form action="/quote" id="form" name="form" class="my-2" method="post">
        <div class="container">
            <div class="row">

                <div class="col-sm-12 col-md-6 my-1 text-center">

                    <div class="card my-1">

                        <img class="card-img-top" src="/storage/image/{{ $item->img }}" alt="Card image cap">
                        <div class="card-body">
                            <h5 class="card-title">{{ $item->name }}</h5>
                            <h5 class="card-title">{{ $item->quantity }}</h5>
                            <i>
                                Min Budget: {{ $item->mb }}
                                |
                                Max Budget: {{ $item->mxb }}
                            </i>

                            {{-- {!! Form::submit($text, [$options]) !!} --}}
                            <form action="/items/{{ $item->id }}" method="POST">
                                <input required type="number" class="form-control" placeholder="Add Own Quote"
                                    aria-label="Recipient's username" name="{{ $item->id }}"
                                    aria-describedby="basic-addon2">
                                <button class="btn btn-outline-secondary" type="submit">Button</button>
                            </form>

                        </div>
                    </div>

                </div>

            </div>
        </div>
    </form>



</body>



<script>
    var form = document.getElementById('form');

    form.addEventListener("submit", (event) => {
        event.preventDefault();
        let fd = new FormData(document.getElementById('form'))

        fd.append('item', document.getElementById('item').value)
        fetch("/quote", {
                method: "POST",
                body: fd
            })
            .then(response => response.text())
            .then(response => {
                console.log(response);


            })
            .catch(err => {
                console.log("Error:", err.message);
            })


    })
</script>

</html>
