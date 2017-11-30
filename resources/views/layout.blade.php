
<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <link rel="icon" href="../../../../favicon.ico">

    <title>Zoo IIS projekt xpolak33</title>

    <!-- Bootstrap core CSS -->
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0-beta.2/css/bootstrap.min.css" integrity="sha384-PsH8R72JQ3SOdhVi3uxftmaW6Vc51MKb0q5P2rRUpPvrszuE4W1povHYgTpBfshb" crossorigin="anonymous">
    {{-- pro kalendář --}}
    <link rel="stylesheet" href="//code.jquery.com/ui/1.11.2/themes/smoothness/jquery-ui.css">

    <!-- Custom styles for this template -->
    <link href="/css/album.css" rel="stylesheet">
</head>

<body>

{{-- header !!!!!!!!!!!!!!!!!!!!! --}}

<header>
    {{--TODO @iis smaž--}}
    {{--<div class="collapse bg-dark" id="navbarHeader">--}}
        {{--<div class="container">--}}
            {{--<div class="row">--}}
                {{--<div class="col-sm-8 py-4">--}}
                    {{--<h4 class="text-white">About</h4>--}}
                    {{--<p class="text-muted">Add some information about the album below, the author, or any other background context. Make it a few sentences long so folks can pick up some informative tidbits. Then, link them off to some social networking sites or contact information.</p>--}}
                {{--</div>--}}
                {{--<div class="col-sm-4 py-4">--}}
                    {{--<h4 class="text-white">Contact</h4>--}}
                    {{--<ul class="list-unstyled">--}}
                        {{--<li><a href="#" class="text-white">Follow on Twitter</a></li>--}}
                        {{--<li><a href="#" class="text-white">Like on Facebook</a></li>--}}
                        {{--<li><a href="#" class="text-white">Email me</a></li>--}}
                    {{--</ul>--}}
                {{--</div>--}}
            {{--</div>--}}
        {{--</div>--}}
    {{--</div>--}}
    <div class="navbar navbar-dark bg-dark">
        <div class="container d-flex justify-content-between">
            <a href="{{ url('/home') }}" class="navbar-brand">Domů</a>
            <a href="{{ url('/osetrovatele' . '/' . Auth::user()->idOsetrovatele) }}" class="navbar-brand">{{ Auth::user()->name }}</a>

            <a href="{{ url('/logout')}}" class="navbar-brand">Odhlaš mě prosím</a>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarHeader" aria-controls="navbarHeader" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
        </div>
    </div>
</header>

{{-- header !!!!!!!!!!!!!!!!!!!!! --}}

    <div class="container" >

        @yield('content')

    </div>

{{-- FOOOOOOOOOOOOOOOOOOOOTER --}}

<footer class="text-muted">
    <div class="container">
        <p class="float-right">
            <a href="#">chceš jít doprdele? klikni sem</a>
        </p>
        <p>NĚCO BY SME SEM MĚLI NAPSAT?!</p>
        <p>KRYŠTOF SMRDÍ</p>
    </div>
</footer>

</body>
</html>
