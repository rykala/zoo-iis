@extends('layout')

@section('content')
        <h1>{{ $zvire->jmeno }}</h1>
        Země původu: {{ $zvire->zemePuvodu }} <br/>
        Oblast výskytu: {{ $zvire->oblastVyskytu }} <br/>
        Rodiče: {{ $zvire->rodici }} <br/>
        Datum narození: {{ $zvire->datumNarozeni }} <br/>
        Datum úmrtí: {{ $zvire->datumUmrti }} <br/>
        {{-- TODO @iss výpis--}}
        Druh: <a href="{{url('/druhyZvirat'). '/' . $druh->id }}">{{ $druh->nazev }}</a> <br/>
        Výběh: <a href="{{url('/vybehy'). '/' . $zvire->idVybehu }}">{{ $zvire->idVybehu }}</a> <br/>
        Čas krmení: {{ $zvire->casKrmeni }} <br/>
        Množství žrádla: {{ $zvire->mnozstviZradla }} <br/>
        Ošetřovatel: <a href="{{url('/osetrovatele') . '/' . $osetrovatel->id }}">{{ $osetrovatel->jmeno }} {{ $osetrovatel->prijmeni }}</a>

        {{-- TODO proč je na konic routy question mark?--}}
        {{ Form::open(['method' => 'GET', 'route' => ['zvirata.edit', $zvire->id]]) }}
        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}

        <hr>

        <form action="{{url('/zvirata')}}">
                <input class="button btn-primary" type="submit" value="Zpět k zvířatům" />
        </form>
@endsection
