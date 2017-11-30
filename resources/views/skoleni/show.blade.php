@extends('layout')

@section('content')
        <h1>{{ $skoleni->id }} - {{ $skoleni->datumSkoleni }}</h1>
        Ošetřovatel: <a href="{{url('/osetrovatele') . '/' . $osetrovatel->id }}">
                {{ $osetrovatel->jmeno . ' ' . $osetrovatel->prijmeni }}</a> <br/>

        @if(!is_null($druhZvirete))
                Druh zvířat: <a href="{{url('/druhyZvirat'). '/' .$druhZvirete->id}}">{{ $druhZvirete->nazev }}</a> <br/>
        @endif

        @if(!is_null($vybeh))
                Výběh: <a href="{{url('/vybehy'). '/' . $vybeh->id }}">{{ $vybeh->id }}</a> <br/>
        @endif



        @level(2)
        {{--TODO proč je na konic routy question mark?--}}
        {{ Form::open(['method' => 'GET', 'route' => ['skoleni.edit', $skoleni->id]]) }}
        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
        @endlevel

        <hr>

        <form action="{{url('/skoleni')}}">
                <input class="button btn-primary" type="submit" value="Zpět k výpisu školení" />
        </form>
@endsection
