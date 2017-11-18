@extends('layout')

@section('content')
        <h1>{{ $vybeh->id }}</h1>
        Potřebný čas: {{ $vybeh->potrebnyCas }} <br/>
        Pomůcky: {{ $vybeh->pomucky }}
        Maximální kapacita: {{ $vybeh->maxKapacita }}
        Počet potřebných ošetřovatelů: {{ $vybeh->pocetPotrebnychOsetrovatelu }}
        Typ vybehu: {{ $vybeh->idTypuVybehu }}

        {{-- TODO proč je na konic routy question mark?--}}
        {{ Form::open(['method' => 'GET', 'route' => ['vybehy.edit', $vybeh->id]]) }}
        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}

        <hr>

        <form action="/vybehy/">
                <input class="button btn-primary" type="submit" value="Zpět k výběhům" />
        </form>
@endsection
