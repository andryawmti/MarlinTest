<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Second Test</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet" type="text/css">

    <!-- Styles -->
    <style>
        html, body {
            background-color: #fff;
            color: #636b6f;
            font-family: 'Nunito', sans-serif;
            font-weight: 200;
            height: 100vh;
            margin: 0;
        }

        .full-height {
            height: 100vh;
        }

        .flex-center {
            align-items: center;
            display: flex;
            justify-content: center;
        }

        .position-ref {
            position: relative;
        }

        .top-right {
            position: absolute;
            right: 10px;
            top: 18px;
        }

        .content {
            text-align: center;
        }

        .title {
            font-size: 84px;
        }

        .links > a {
            color: #636b6f;
            padding: 0 25px;
            font-size: 13px;
            font-weight: 600;
            letter-spacing: .1rem;
            text-decoration: none;
            text-transform: uppercase;
        }

        .m-b-md {
            margin-bottom: 30px;
        }
        .cost-list {
            list-style: none;
            margin: 0;
            padding: 0;
            overflow: auto;
        }

        .cost-list li {
            padding: 0;
            margin: 0 0 10px 0;
        }

        .cost-list li:not(:last-child) {
            border-bottom: 1px solid #818182;
        }

        .cost-list li p {
            color: #1b1e21;
        }
    </style>
</head>
<body>
<div style="padding: 20px 0" class="flex-center position-ref">
    <div class="content" style="padding: 10px;">
        <div class="title m-b-md">
            Second Test
        </div>
        <div class="row">
            <h4>Cost for delivery from Yogyakarta to Bali with 2 Kg of weight</h4>
        </div>

        <div class="row">
            <h4>Result</h4>
            <h4>Courier: {{ $delivery_cost->rajaongkir->results[0]->name }}</h4>
            <ul class="cost-list">
                @foreach($delivery_cost->rajaongkir->results[0]->costs as $cost)
                    <li>
                        <p>Service: {{ $cost->service }}</p>
                        <p>Description: {{ $cost->description }}</p>
                        <p>Cost: Rp. {{ number_format($cost->cost[0]->value, 2, ',', '.') }}</p>
                        <p>Estimation: {{ $cost->cost[0]->etd }} days</p>
                    </li>
                @endforeach
            </ul>
        </div>

        <div style="margin-top: 30px;" class="links">
            <a href="/">Home</a>
            <a href="{{ route('first-test') }}">First Test</a>
            <a href="{{ route('second-test') }}">Second Test</a>
        </div>
    </div>
</div>
</body>
</html>
