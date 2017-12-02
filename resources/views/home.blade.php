@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-12">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <div class="tiles">
                        <a class="tile" href="{{url('/osetrovatele')}}" class="navbar-brand">Ošetřovatelé</a>
                        <a class="tile" href="{{url('/vybehy')}}" class="navbar-brand">Výběhy</a>
                        <a class="tile" href="{{url('/zvirata')}}" class="navbar-brand">Zvířata</a>
                        <a class="tile" href="{{url('/typyVybehu')}}" class="navbar-brand">Typy výběhů</a>
                        <a class="tile" href="{{url('/druhyZvirat')}}" class="navbar-brand">Druhy zvířat</a>
                        <a class="tile" href="{{url('/cisteni')}}" class="navbar-brand">Čištění</a>
                        <a class="tile" href="{{url('/skoleni')}}" class="navbar-brand">Školení</a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


@endsection
