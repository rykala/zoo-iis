@extends('layout')

@section('content')
        <h1 class="list-header">{{ $skoleni->id }} - {{ $skoleni->datumSkoleni }}</h1>
        Ošetřovatel: <a href="{{url('/osetrovatele') . '/' . $osetrovatel->id }}">
                {{ $osetrovatel->jmeno . ' ' . $osetrovatel->prijmeni }}</a> <br/>

        @if(!is_null($druhZvirete))
                Druh zvířat: <a href="{{url('/druhyZvirat'). '/' .$druhZvirete->id}}">{{ $druhZvirete->nazev }}</a> <br/>
        @endif

        @if(!is_null($vybeh))
                @foreach($typyVybehu as $typ)
                        @if($vybeh->idTypuVybehu === $typ->id)
                                Výběh: <a href="{{url('/vybehy'). '/' . $vybeh->id }}">{{ $vybeh->id }} - {{ $typ->nazev }}</a> <br/>
                        @endif
                @endforeach
        @endif



        @level(2)
        {{--TODO proč je na konic routy question mark?--}}
        {{ Form::open(['method' => 'GET', 'route' => ['skoleni.edit', $skoleni->id]]) }}
        {{ Form::submit('Upravit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
        @endlevel

        <hr>

        <form action="{{url('/skoleni')}}">
                <input class="btn btn-primary" type="submit" value="Zpět k výpisu školení" />
        </form>
@endsection
