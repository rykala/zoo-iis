@extends('layout')

@section('content')
        <h1>{{ $cisteni->id }}</h1>
        Ošetřovatel: <a href="/osetrovatele/{{ $osetrovatel->id }}">{{ $osetrovatel->jmeno }} {{ $osetrovatel->prijmeni }}</a> <br/>
        Výběh: <a href="/vybehy/{{ $vybeh->id }}">{{ $vybeh->id }}</a> <br/>
        Čas čištění: {{ $cisteni->casCisteni }} <br/>

        @level(2)
        {{-- TODO proč je na konic routy question mark?--}}
        {{ Form::open(['method' => 'GET', 'route' => ['cisteni.edit', $cisteni->id]]) }}
        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
        @endlevel
        <hr>


        <form action="/cisteni/">
                <input class="button btn-primary" type="submit" value="Zpět k seznamu čištění" />
        </form>
@endsection
