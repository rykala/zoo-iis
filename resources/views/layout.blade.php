
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>ZOO IIS</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    {{-- pro kalendář --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    <script src="https://cdnjs.cloudflare.com/ajax/libs/tether/1.4.0/js/tether.min.js" integrity="sha384-DztdAPBWPRXSA/3eYEEUWrWCy7G5KFbe8fFjk5JAIxUYHKkDx6Qin1DkWx51bBrb" crossorigin="anonymous"></script>
    <script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-alpha.6/js/bootstrap.min.js" integrity="sha384-vBWWzlZJ8ea9aCX4pEW3rVHjgjt7zpkNpZk+02D9phzyeVkE+jo0ieGizqPLForn" crossorigin="anonymous"></script>
    <!-- Custom styles for this template -->
    <link href="/css/album.css" rel="stylesheet">
    <link href="/css/zoo.css" rel="stylesheet">
</head>

<script>

    function ConfirmDelete()
    {
        var x = confirm("Jste si jistí že chcete smazat daný záznam? Je možné že smazání tohoto záznamu způsobí smazání jiných závislých záznamů");
        if (x)
            return true;
        else
            return false;
    }

</script>

<body>

{{-- header !!!!!!!!!!!!!!!!!!!!! --}}

<header>
    <nav class="navbar navbar-toggleable-md navbar-dark bg-dark">
      <button class="navbar-toggler navbar-toggler-right" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
      </button>

      <a class="navbar-brand" href="{{ url('/home') }}">ZOO IIS</a>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/home') }}">Home <span class="sr-only">(current)</span></a>
            </li>
            <li class="nav-item">
                <a class="nav-link" href="{{ url('/osetrovatele' . '/' . Auth::user()->idOsetrovatele) }}">Profil ({{ Auth::user()->email }})</a>
            </li>

            <li class="divider"></li>

            <li class="nav-item">
                <a href="{{url('/osetrovatele')}}" class="nav-link">Ošetřovatelé</a>
            </li>
            <li class="nav-item">
                <a href="{{url('/vybehy')}}" class="nav-link">Výběhy</a>
            </li>
            <li class="nav-item">
                <a href="{{url('/zvirata')}}" class="nav-link">Zvířata</a>
            </li>
            <li class="nav-item">
                <a href="{{url('/typyVybehu')}}" class="nav-link">Typy výběhů</a>
            </li>
            <li class="nav-item">
                <a href="{{url('/druhyZvirat')}}" class="nav-link">Druhy zvířat</a>
            </li>
            <li class="nav-item">
                <a href="{{url('/cisteni')}}" class="nav-link">Čištění</a>
            </li>
            <li class="nav-item">
                <a href="{{url('/skoleni')}}" class="nav-link">Školení</a>
            </li>

            <li class="divider"></li>

            <li class="nav-item">
                <a href="{{ url('/logout')}}" class="nav-link">Odhlásit</a>            
            </li>
        </ul>
      </div>
    </nav>
</header>
{{-- header !!!!!!!!!!!!!!!!!!!!! --}}

    <div class="container">

        @yield('content')

    </div>
</body>
</html>
