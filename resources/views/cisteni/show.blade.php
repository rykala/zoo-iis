@extends('layout')

@section('content')
        <h1 class="list-header">{{ $cisteni->id }}</h1>
        Ošetřovatel: <a href="{{url('/osetrovatele') . '/' . $osetrovatel->id }}">{{ $osetrovatel->jmeno }} {{ $osetrovatel->prijmeni }}</a> <br/>
        @foreach($typyVybehu as $typ)
                @if($vybeh->idTypuVybehu === $typ->id)
                        Výběh: <a href="{{url('/vybehy'). '/' . $vybeh->id }}">{{ $vybeh->id }} - {{ $typ->nazev }}</a> <br/>
                @endif
        @endforeach
        Čas čištění: {{ $cisteni->casCisteni }} <br/>

        @level(2)
        {{-- TODO proč je na konic routy question mark?--}}
        {{ Form::open(['method' => 'GET', 'route' => ['cisteni.edit', $cisteni->id]]) }}
        {{ Form::submit('Upravit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
        @endlevel
        <hr>


        <form action="{{url('/cisteni')}}">
                <input class="btn btn-primary" type="submit" value="Zpět k seznamu čištění" />
        </form>
@endsection
