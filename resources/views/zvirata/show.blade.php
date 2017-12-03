@extends('layout')

@section('content')
        <h1 class="list-header">{{ $zvire->jmeno }}</h1>
        <div>
        Země původu: {{ $zvire->zemePuvodu }} <br/>
        Oblast výskytu: {{ $zvire->oblastVyskytu }} <br/>
        Rodiče: {{ $zvire->rodici }} <br/>
        Datum narození: {{ $zvire->datumNarozeni }} <br/>
        Datum úmrtí: {{ $zvire->datumUmrti }} <br/>
        {{-- TODO @iss výpis--}}
        Druh: <a href="{{url('/druhyZvirat'). '/' . $druh->id }}">{{ $druh->nazev }}</a> <br/>

{{--                Výběh: <a href="{{url('/vybehy'). '/' . $zvire->idVybehu }}">{{ $zvire->idVybehu }}</a> <br/>--}}
        @foreach($vybehy as $vybeh)
                @if($vybeh->id === $zvire->idVybehu)
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
        </div>

        {{-- TODO proč je na konic routy question mark?--}}
        {{ Form::open(['method' => 'GET', 'route' => ['zvirata.edit', $zvire->id]]) }}
        {{ Form::submit('Upravit zvíře', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}

        <hr>

        <form action="{{url('/zvirata')}}">
                <input class="btn btn-primary" type="submit" value="Zpět k zvířatům" />
        </form>
@endsection
