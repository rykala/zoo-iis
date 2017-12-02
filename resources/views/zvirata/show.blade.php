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


        @foreach($vybehy as $vybeh)
                @if($vybeh->idTypuVybehu === $zvire->idVybehu)
                        @foreach($typyVybehu as $typ)
                                @if($vybeh->idTypuVybehu === $typ->id)
                                        Výběh: <a href="{{url('/vybehy'). '/' . $zvire->idVybehu }}">{{ $zvire->idVybehu }} - {{ $typ->nazev }}</a> <br/>
                                @endif
                        @endforeach
                @break
                @endif
        @endforeach






        Čas krmení: {{ $zvire->casKrmeni }} minut<br/>
        Množství žrádla: {{ $zvire->mnozstviZradla }} gramů<br/>
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
