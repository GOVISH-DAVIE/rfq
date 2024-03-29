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
            margin: 0;
            padding: 0;
            font: 400 .875rem 'Open Sans', sans-serif;
            color: #bcd0f7;
            background: #1A233A;
            position: relative;
            height: 100%;
        }

        .invoice-container {
            padding: 1rem;
        }

        .invoice-container .invoice-header .invoice-logo {
            margin: 0.8rem 0 0 0;
            display: inline-block;
            font-size: 1.6rem;
            font-weight: 700;
            color: #bcd0f7;
        }

        .invoice-container .invoice-header .invoice-logo img {
            max-width: 130px;
        }

        .invoice-container .invoice-header address {
            font-size: 0.8rem;
            color: #8a99b5;
            margin: 0;
        }

        .invoice-container .invoice-details {
            margin: 1rem 0 0 0;
            padding: 1rem;
            line-height: 180%;
            background: #1a233a;
        }

        .invoice-container .invoice-details .invoice-num {
            text-align: right;
            font-size: 0.8rem;
        }

        .invoice-container .invoice-body {
            padding: 1rem 0 0 0;
        }

        .invoice-container .invoice-footer {
            text-align: center;
            font-size: 0.7rem;
            margin: 5px 0 0 0;
        }

        .invoice-status {
            text-align: center;
            padding: 1rem;
            background: #272e48;
            -webkit-border-radius: 4px;
            -moz-border-radius: 4px;
            border-radius: 4px;
            margin-bottom: 1rem;
        }

        .invoice-status h2.status {
            margin: 0 0 0.8rem 0;
        }

        .invoice-status h5.status-title {
            margin: 0 0 0.8rem 0;
            color: #8a99b5;
        }

        .invoice-status p.status-type {
            margin: 0.5rem 0 0 0;
            padding: 0;
            line-height: 150%;
        }

        .invoice-status i {
            font-size: 1.5rem;
            margin: 0 0 1rem 0;
            display: inline-block;
            padding: 1rem;
            background: #1a233a;
            -webkit-border-radius: 50px;
            -moz-border-radius: 50px;
            border-radius: 50px;
        }

        .invoice-status .badge {
            text-transform: uppercase;
        }

        @media (max-width: 767px) {
            .invoice-container {
                padding: 1rem;
            }
        }

        .card {
            background: #272E48;
            -webkit-border-radius: 5px;
            -moz-border-radius: 5px;
            border-radius: 5px;
            border: 0;
            margin-bottom: 1rem;
        }

        .custom-table {
            border: 1px solid #2b3958;
        }

        .custom-table thead {
            background: #2f71c1;
        }

        .custom-table thead th {
            border: 0;
            color: #ffffff;
        }

        .custom-table>tbody tr:hover {
            background: #172033;
        }

        .custom-table>tbody tr:nth-of-type(even) {
            background-color: #1a243a;
        }

        .custom-table>tbody td {
            border: 1px solid #2e3d5f;
        }

        .table {
            background: #1a243a;
            color: #bcd0f7;
            font-size: .75rem;
        }

        .text-success {
            color: #c0d64a !important;
        }

        .custom-actions-btns {
            margin: auto;
            display: flex;
            justify-content: flex-end;
        }

        .custom-actions-btns .btn {
            margin: .3rem 0 .3rem .3rem;
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
    <div class="container">
        <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
            <div class="custom-actions-btns mb-5">
                <a href="#" class="btn btn-primary">
                    <i class="icon-download"></i> Download
                </a>
                <button onclick="printInvoice()" class="btn btn-secondary">
                    <i class="icon-printer"></i> Print
                </button>
            </div>
        </div>
    </div>

    <div id="doc" class="container">
        <div class="row gutters">
            <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 col-12">
                <div class="card">

                    <div class="card-body p-0">
                        <div class="invoice-container">
                            <div class="invoice-header">

                                <!-- Row start -->
                                <div class="row gutters">

                                </div>
                                <!-- Row end -->

                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-xl-6 col-lg-6 col-md-6 col-sm-6">
                                        <a href="index.html" class="invoice-logo">
                                            {{-- {{$item->get_item->item}} --}}

                                            INVOICE(NOT PAID)
                                        </a>
                                    </div>
                                    <div class="col-lg-6 col-md-6 col-sm-6">
                                        <address class="text-right">
                                            {{ $invoice->vendorname }}<br>
                                            {{ $invoice->vendoremail }}<br>
                                        </address>
                                    </div>
                                </div>
                                <!-- Row end -->

                                <div class="row gutters">
                                    <div class="col-xl-9 col-lg-9 col-md-12 col-sm-12 col-12">
                                        <div class="invoice-details">
                                            <address>
                                                {{ $invoice->item->getrequestuser->fullName }}<br>
                                                {{ $invoice->item->getrequestuser->email }}
                                            </address>
                                        </div>
                                    </div>
                                    <div class="col-xl-3 col-lg-3 col-md-12 col-sm-12 col-12">
                                        <div class="invoice-details">
                                            <div class="invoice-num">
                                                <div>Invoice - {{ $invoice->uuid }}</div>
                                                <div>{{ $invoice->created_at }}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>

                                <!-- Row start -->

                                <!-- Row end -->

                            </div>

                            <div class="invoice-body">

                                <!-- Row start -->
                                <div class="row gutters">
                                    <div class="col-lg-12 col-md-12 col-sm-12">
                                        <div class="table-responsive">
                                            <table class="table custom-table m-0">
                                                <thead>
                                                    <tr>
                                                        <th>Items</th>
                                                        <th></th>
                                                        <th>Quantity</th>
                                                        <th>Sub Total</th>
                                                    </tr>
                                                </thead>
                                                <tbody>
                                                    <?php
                                                    $u = 0;
                                                    ?>
                                                    <tr>
                                                        <td>
                                                            {{ $invoice->item->name }}
                                                            <p class="m-0 text-muted">

                                                            </p>
                                                        </td>
                                                        <td></td>
                                                        <td>{{ $invoice->item->quantity }}</td>
                                                        <td>KES {{ $invoice->price }}</td>
                                                        <?php
                                                        $u = $u + intval($invoice->price);
                                                        ?>
                                                    </tr>

                                                    <tr>
                                                        <td>&nbsp;</td>
                                                        <td colspan="2">
                                                            <p>
                                                                Subtotal<br>
                                                                {{-- Shipping &amp; Handling<br>
                                                                Tax<br> --}}
                                                            </p>
                                                            <h5 class="text-success"><strong>Grand Total</strong></h5>
                                                        </td>
                                                        <td>
                                                            <p>
                                                                KES {{ $invoice->item->price }}<br>
                                                                {{-- $100.00<br>
                                                                $49.00<br> --}}
                                                            </p>
                                                            <h5 class="text-success"><strong>KES
                                                                    {{ $u }}</strong></h5>

                                                            <form id="form" name="form">
                                                                <input type="text" name="item"  hidden id="">
                                                                <input type="text" name="total"  hidden id="">
                                                                <input required type="text" name="number"
                                                                    class="form-control my-1" id=""
                                                                    placeholder="2547000...">
                                                                <div id="submit">
                                                                    <input type="submit" class="btn btn-success"
                                                                        value="LIPA NA M PESA">
                                                                        
                                                                </div>

                                                            </form>
                                                            <div id="confirmMpesa"></div>
                                                        </td>
                                                    </tr>
                                                </tbody>
                                            </table>
                                        </div>
                                    </div>
                                </div>
                                <!-- Row end -->

                            </div>

                            <div class="invoice-footer">
                                Thank you for your Business.
                            </div>

                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>



</body>



<script>
    var form = document.getElementById('form');

    let printInvoice = () => {
        window.print()
    }

    form.addEventListener("submit", (event) => {
        event.preventDefault();
        let fd = new FormData(document.getElementById('form'))

        fetch("/mpesa", {
                method: "POST",
                body: fd
            })
            .then(response => response.json())
            .then(response => {
                console.log(response);
                document.getElementById('submit').innerHTML = `<img src="/s.gif" height='60' alt="">`
                setTimeout(() => {
                    document.getElementById('confirmMpesa').innerHTML =
                        ` <button class="btn btn-success" type='button' onclick="mpesaConfirm('${response.body}')">Confirm MPesa Payment</button>`

                }, 3000);

            })
            .catch(err => {
                console.log("Error:", err.message);
            })


    })

    let mpesaConfirm = (key) => {
        document.getElementById('confirmMpesa').innerHTML = ``


        setTimeout(() => {
            document.getElementById('confirmMpesa').innerHTML =
                ` <button class="btn btn-outlined-warning" type='button' >Confirming the M-Pesa Payment...</button>`

        }, 2000);

        fetch(`/mpesa/${key}`, {
                method: "Get",
            })
            .then(response => response.json())
            .then(response => {
                window.alert(response.ResultDesc)
                window.location.replace("/")

            })
            .catch(err => {
                console.log("Error:", err.message);
            })
    }
</script>

</html>
