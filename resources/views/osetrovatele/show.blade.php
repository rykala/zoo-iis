@extends('layout')

@section('content')
        <h1>{{ $osetrovatel->jmeno }} {{ $osetrovatel->prijmeni }}</h1>
        Vzdělání: {{ $osetrovatel->vzdelani }} <br/>
        Titul: {{ $osetrovatel->titul }} <br/>

        @if(Auth::user()->idOsetrovatele === $osetrovatel->id)
        {{-- TODO proč je na konic routy question mark?--}}
        {{ Form::open(['method' => 'GET', 'route' => ['osetrovatele.edit', $osetrovatel->id]]) }}
        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
        @endif

        @level(3)
                {{-- TODO proč je na konic routy question mark?--}}
                {{ Form::open(['method' => 'GET', 'route' => ['osetrovatele.edit', $osetrovatel->id]]) }}
                {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
        @endlevel

        @if(Auth::user()->idOsetrovatele !== $osetrovatel->id)
                @if($showMakeHlOButton == true)
                        @level(3)
                        <hr>
                        <form action="/setHlavniOsetrovatel/{{$osetrovatel->id}}">
                                <input class="button btn-primary" type="submit" value="NASTAV HLAVNÍHO OŠETŘOVATELE" />
                        </form>
                        @endlevel
                @else
                        @level(3)
                        <hr>
                        <form action="/unsetHlavniOsetrovatel/{{$osetrovatel->id}}">
                                <input class="button btn-primary" type="submit" value="ODNASTAV HLAVNÍHO OŠETŘOVATELE" />
                        </form>
                        @endlevel
                @endif
        @endif

        <hr>

        <form action="/osetrovatele/">
                <input class="button btn-primary" type="submit" value="Zpět k ošetřovatelům" />
        </form>
@endsection
