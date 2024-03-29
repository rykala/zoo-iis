@extends('layout')

@section('content')
        <h1 class="list-header">{{ $vybeh->id }} {{ $typVybehu->nazev }}</h1>
        Potřebný čas na čištění: {{ $vybeh->potrebnyCas }} minut<br/>
        Pomůcky: {{ $vybeh->pomucky }} <br/>
        Maximální kapacita: {{ $vybeh->maxKapacita }} <br/>
        Počet potřebných ošetřovatelů: {{ $vybeh->pocetPotrebnychOsetrovatelu }} <br/>

        @if(count($zvirata))
                <hr>
                Zvířata ve výběhu: <br/>
                @foreach($zvirata as $zvire)
                        Zvíře: <a href="{{url('/zvirata'). '/' . $zvire->id }}">{{ $zvire->jmeno }}</a> <br/>
                @endforeach
                <hr>
        @endif

        @level(3)
        {{-- TODO proč je na konic routy question mark?--}}
        {{ Form::open(['method' => 'GET', 'route' => ['vybehy.edit', $vybeh->id]]) }}
        {{ Form::submit('Upravit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
        <hr>
        @endlevel

        <form action="{{url('/vybehy')}}">
                <input class="btn btn-primary" type="submit" value="Zpět k výběhům" />
        </form>
@endsection
