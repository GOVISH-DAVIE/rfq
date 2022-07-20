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
                <div class="col-sm-12 col-md-8 my-1 text-center">
                    <div class="card">
                        <div class="card-body">
                            <h5 class="card-title"> CLient Name: {{ $item->fullName }}</h5>
                            <i>Client Email: {{ $item->email }}</i>
                            <p class="card-text">{{ $item->location }}</p>
                            <p class="card-text"><small class="text-muted">
                                    No. Items: <?php print_r(count(json_decode($item->items))); ?></small></p>

                        </div>
                    </div>
                    <div class="card my-2">
                        <div class="card-body">
                            <input type="text" name="item" id="" value="{{ $item->id }}" hidden>
                            <input required name="name" type="text" class="form-control my-1"
                                placeholder="Vendor Name" aria-label="Vendor Name" aria-describedby="basic-addon2">
                            <input required name="email" type="email" class="form-control my-1"
                                placeholder="Vendor Email" aria-label="Vendor Name" aria-describedby="basic-addon2">

                            <button class=" btn btn-outline-dark my-2" type="submit">Submit Quote</button>
                        </div>
                    </div>

                </div>
                <div class="col-sm-12 col-md-4 my-1 text-center">

                    @foreach (json_decode($item->items) as $key => $it)
                        <div class="card my-1">

                            <img class="card-img-top" src="/storage/image/{{ $it->img }}" alt="Card image cap">
                            <div class="card-body">
                                <h5 class="card-title">{{ $it->item }}</h5>
                                <h5 class="card-title">{{ $it->quantity }}</h5>
                                <p class="card-text">{{ $item->des }}</p>
                                <i>
                                    Min Budget: {{ $it->mb }}
                                    |
                                    Max Budget: {{ $it->mxb }}
                                </i>


                                <div class="input-group mb-3">
                                    <input required type="number" class="form-control" placeholder="Add Own Quote"
                                        aria-label="Recipient's username"
                                        name="{{ $key }}#{{$it->item}}#{{$it->quantity}}"
                                        aria-describedby="basic-addon2">
                                    <div class="input-group-append">
                                        {{-- <button class="btn btn-outline-secondary" type="button">Button</button> --}}
                                    </div>
                                </div>
                            </div>
                        </div>
                    @endforeach

                </div>

            </div>
        </div>
    </form>



</body>



<script>
    var form = document.getElementById('form');

    form.addEventListener("submit", (event) => {
        event.preventDefault();
        let fd = new FormData(document.forms.form)

        fetch("/quote", {
                method: "POST",
                body: new FormData(document.getElementById('form'))
            })
            .then(response => response.json())
            .then(response => {
                console.log(response);
                response.forEach(element => {
                    console.log(JSON.parse(element));
                });
            })
            .catch(err => {
                console.log("Error:", err);
            })


    })
</script>

</html>
