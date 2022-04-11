<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport"
          content="width=device-width, user-scalable=no, initial-scale=1.0, maximum-scale=1.0, minimum-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link rel="stylesheet" href="{{asset('css/app.css')}}">
    <script src="https://code.jquery.com/ui/1.13.1/jquery-ui.js"></script>

    <title>StarWarsDoc</title>

</head>
<body>

<nav class="navbar navbar-expand-lg navbar-light bg-light">
    <div class="container-fluid">
        <a class="navbar-brand" href="{{route('people.index')}}">Star Wars Library</a>
        <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown"
                aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarNavDropdown">
            <ul class="navbar-nav">
                <li class="nav-item">
                    <a class="nav-link active" aria-current="page" href="{{route('people.create')}}">Create New Person</a>
                </li>
                <li class="nav-item">
                    <a class="nav-link" href="{{route('homeworlds.index')}}">Choose the people of the planet</a>
                </li>
            </ul>
        </div>
    </div>
</nav>

<div class="container">
    {{$slot}}
</div>
<x-success-message/>
</body>
</html>
