<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <title>Laravel</title>

    <!-- Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;600;700&display=swap" rel="stylesheet">
    <link href="./css/normalize.css" rel="stylesheet">
    <link href="./css/home.css" rel="stylesheet">
</head>

<body class="antialiased">
    <div class="form">
        <form action="/" method="post">
            <div class="title">
                Enter the parcel details
            </div>
            <div class="input-container ic1">
                <input name="from" class="input" type="text" placeholder=" " required />
                <div class="cut"></div>
                <label for="from" class="placeholder">From</label>
            </div>
            <div class="input-container ic2">
                <input name="to" class="input" type="text" placeholder=" " required />
                <div class="cut"></div>
                <label for="to" class="placeholder">To</label>
            </div>
            <div class="input-container ic2">
                <input name="weight" class="input" type="number" min="0.1" step="0.1" max="1000"
                    placeholder=" " required />
                <div class="cut cut-short"></div>
                <label for="weight" class="placeholder">Weight</>
            </div>
            <div class="wrapper ic2">
                <input type="radio" name="option" id="option-1" value="fast" checked>
                <input type="radio" name="option" id="option-2" value="slow">
                <label for="option-1" class="option option-1">
                    <div class="dot"></div>
                    <span>Fast</span>
                </label>
                <label for="option-2" class="option option-2">
                    <div class="dot"></div>
                    <span>Slow</span>
                </label>
            </div>
            <button type="text" class="submit">submit</button>
            @csrf
        </form>
    </div>
    @if($results)
        <div class="results">
            <h1>Prices</h1>
            <div class="companies">
                @foreach ($results as $cpn => $cp)
                    <div class="company">
                        <div class="company_name">{{ $cpn }}</div>
                        <div class="price">{{ $cp['price'] }}</div>
                        <div class="date">{{ $cp['date'] }}</div>
                    </div>
                @endforeach
            </div>

        </div>
    @endif
</body>

</html>
