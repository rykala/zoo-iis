@extends('layout')

@section('content')
        <h1>{{ $vybeh->id }}</h1>
        Potřebný čas: {{ $vybeh->potrebnyCas }} <br/>
        Pomůcky: {{ $vybeh->pomucky }} <br/>
        Maximální kapacita: {{ $vybeh->maxKapacita }} <br/>
        Počet potřebných ošetřovatelů: {{ $vybeh->pocetPotrebnychOsetrovatelu }} <br/>
        Typ vybehu: {{ $typVybehu->nazev }} <br/>

        @if(count($zvirata))
                <hr>
                Zvířata ve výběhu: <br/>
                @foreach($zvirata as $zvire)
                        Zvíře: <a href="/zvirata/{{ $zvire->id }}">{{ $zvire->id }}</a> <br/>
                @endforeach
                <hr>
        @endif

        {{-- TODO proč je na konic routy question mark?--}}
        {{ Form::open(['method' => 'GET', 'route' => ['vybehy.edit', $vybeh->id]]) }}
        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}

        <hr>

        <form action="/vybehy/">
                <input class="button btn-primary" type="submit" value="Zpět k výběhům" />
        </form>
@endsection
