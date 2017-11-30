@extends('layout')

@section('content')
<div class="container">
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif

                    <h2>Jsi přihlášen!</h2>

                        <a href="{{url('/osetrovatele')}}" class="navbar-brand">Ošetřovatelé</a> </br>
                        <a href="{{url('/vybehy')}}" class="navbar-brand">Výběhy</a> </br>
                        <a href="{{url('/zvirata')}}" class="navbar-brand">Zvířata</a> </br>
                        <a href="{{url('/typyVybehu')}}" class="navbar-brand">Typy výběhů</a> </br>
                        <a href="{{url('/druhyZvirat')}}" class="navbar-brand">Druhy zvířat</a> </br>
                        <a href="{{url('/cisteni')}}" class="navbar-brand">Čištění</a> </br>
                        <a href="{{url('/skoleni')}}" class="navbar-brand">Školení</a> </br>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
