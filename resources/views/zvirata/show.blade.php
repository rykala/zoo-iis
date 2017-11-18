@extends('layout')

@section('content')
        <h1>{{ $zvire->id }}</h1>
        Země původu: {{ $zvire->zemePuvodu }} <br/>
        Oblast výskytu: {{ $zvire->oblastVyskytu }} <br/>
        Rodiče: {{ $zvire->rodici }} <br/>
        Datum narození: {{ $zvire->datumNarozeni }} <br/>
        Datum úmrtí: {{ $zvire->datumUmrti }} <br/>
        {{-- TODO @iss výpis--}}
        Druh: {{ $zvire->idDruhu }} <br/>
        Výběh: {{ $zvire->idVybehu }} <br/>
        Čas krmení: {{ $zvire->casKrmeni }} <br/>
        Množství žrádla: {{ $zvire->mnozstviZradla }} <br/>
        Ošetřovatel: {{ $zvire->idOsetrovatele }}

        {{-- TODO proč je na konic routy question mark?--}}
        {{ Form::open(['method' => 'GET', 'route' => ['zvirata.edit', $zvire->id]]) }}
        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}

        <hr>

        <form action="/zvirata/">
                <input class="button btn-primary" type="submit" value="Zpět k zvířatům" />
        </form>
@endsection
