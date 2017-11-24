@extends('layout')

@section('content')

    <h1>Vytvoř nový záznam čištění</h1>

    <hr>

    <form method="POST" action="/cisteni">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="idOsetrovatele">Ošetřovatel</label>
            <select class="form-control" name="idOsetrovatele">
                @foreach($osetrovatele as $osetrovatel)
                    <option value="{{$osetrovatel->id}}">{{$osetrovatel->jmeno}} {{$osetrovatel->prijmeni}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="idVybehu">Výběh</label>
            <select class="form-control" name="idVybehu">
                @foreach($vybehy as $vybeh)
                    <option value="{{$vybeh->id}}">{{$vybeh->id}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="casCisteni">Čas čištění</label>
            <select class="form-control" name="casCisteni">
                @foreach($casyCisteni as $cas)
                    <option value="{{$cas}}">{{$cas}}</option>
                @endforeach
            </select>
        </div>



        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        @include('layouts.errors')

    </form>

    <hr>

    <form action="/cisteni/">
        <input class="button btn-primary" type="submit" value="Zpět k seznamu čištění" />
    </form>


@endsection