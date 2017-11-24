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

                        <a href="/osetrovatele" class="navbar-brand">Ošetřovatelé</a> </br>
                        <a href="/vybehy" class="navbar-brand">Výběhy</a> </br>
                        <a href="/zvirata" class="navbar-brand">Zvířata</a> </br>
                        <a href="/typyVybehu" class="navbar-brand">Typy výběhů</a> </br>
                        <a href="/druhyZvirat" class="navbar-brand">Druhy zvířat</a> </br>
                        <a href="/cisteni" class="navbar-brand">Čištění</a> </br>
                        <a href="/skoleni" class="navbar-brand">Školení</a> </br>

                </div>
            </div>
        </div>
    </div>
</div>


@endsection
