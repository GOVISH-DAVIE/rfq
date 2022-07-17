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
  <div class="container">
    <div class="row">
        @foreach ($rfqs as $item)
        
                <div class="col-sm-12 col-md-4 my-1">
                    <div class="card">
                        <div class="card-body">
                          <h5 class="card-title"> CLient Name: {{ $item->fullName }}</h5>
                          <i>Client Email: {{ $item->email }}</i>
                          <p class="card-text">{{ $item->location }}</p>
                          <p class="card-text"><small class="text-muted">
                            No. Items: <?php print_r(count(json_decode($item->items))); ?></small></p>

                            <a class="btn btn-outline-dark" href="/rfc/{{$item->id}}">view </a>
                        </div>
                      </div>
              
                </div>
            
        @endforeach
    </div>
  </div>

</body>

</html>
