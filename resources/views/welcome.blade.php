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
    <br>
    <div class="container card">
        <h1 class='text-center'>
            Let Us Know What You Want.
        </h1>
        <form class="m-3" name="form" id='form'>
            <div class="row">
                <div class="col-ls-6 col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Full Name</label>
                        <input required type="text" name="name" class="form-control" placeholder="Ful name">

                    </div>
                </div>
                <div class="col-ls-6 col-sm-6">
                    <div class="form-group">
                        <label for="exampleInputEmail1">Email address</label>
                        <input required type="email" name="email" class="form-control" placeholder="Enter email">

                    </div>
                </div>
            </div>
            <div class="form-group">
                <label for="exampleInputPassword1">Location</label>
                <input required type="text" name="location" class="form-control"
                    placeholder="Location..Kenya Nairobi">
            </div>
            <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Item name</label>
                        <input required type="text" name="itemName" class="form-control" placeholder="..Sony TV">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea type="text" name="description" class="form-control" placeholder="43 inch"></textarea>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Image</label>
                        <input type="file" name="img" class="form-control" placeholder="image">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Quantity</label>
                        <input required type="number" name="quantity" class="form-control" placeholder=" ">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Min budget</label>
                        <input required type="text" name="mb" class="form-control" placeholder=" ">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Max budget</label>
                        <input required type="text" name="mxb" class="form-control" placeholder="">
                    </div>
                </div>
                <hr style="width:100%;text-align:left;margin-left:0">
            </div>
            <div id="add">

            </div>
            <div class="form-check m-1">

                <button type="button" class="btn btn-dark" onclick="addNew()">+ Add a new Item</button>
            </div>

            <div class="form-check m-1">
                <button type="submit" class="btn btn-primary">Submit</button>
            </div>
        </form>
    </div>
</body>

</html>


<script>
    function makeid(length) {
        var result = '';
        var characters = 'ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789';
        var charactersLength = characters.length;
        for (var i = 0; i < length; i++) {
            result += characters.charAt(Math.floor(Math.random() *
                charactersLength));
        }
        return result;
    }

    function addNew() {

        let key = makeid(5)
        document.getElementById('add').innerHTML += `  <div class="row">
                <div class="col-lg-4 col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Item name</label>
                        <input required type="text" name='item_${key}' class="form-control" id="exampleInputPassword1" placeholder="..Sony TV">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Description</label>
                        <textarea type="text" name='des_${key}' class="form-control" id="exampleInputPassword1" placeholder="43 inch"></textarea>
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Image</label>
                        <input   type="file" name='img_${key}' class="form-control" id="exampleInputPassword1" placeholder="image">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Quantity</label>
                        <input required type="number" name="quantity_${key}" class="form-control" placeholder=" ">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Min budget</label>
                        <input required type="text" name="mb_${key}" class="form-control" id="exampleInputPassword1" placeholder=" ">
                    </div>
                </div>
                <div class="col-lg-4 col-sm-4">
                    <div class="form-group">
                        <label for="exampleInputPassword1">Max budget</label>
                        <input required type="text" name="mxb_${key}" class="form-control" id="exampleInputPassword1" placeholder=" ">
                    </div>
                </div>
                <hr style="width:100%;text-align:left;margin-left:0">
            </div>`;
    }
    var form = document.getElementById('form');

    form.addEventListener('submit', function(e) {

        e.preventDefault();
        console.log(232);
        let fd = new FormData(document.forms.form);
        // console.log()) 
        fetch('/rfq', {
                method: 'POST',
                body: new FormData(document.getElementById('form')),

            })
            .then(response => response.text())
            .then(result => {
                // console.log('Success:', result);
                window.alert("Uploaded successfully")
            })
            .catch(error => {
                console.error('Error:', error);
            });


    });
</script>
