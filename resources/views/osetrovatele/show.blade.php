@extends('layout')

@section('content')
        <h1>{{ $osetrovatel->jmeno }} {{ $osetrovatel->prijmeni }}</h1>
        Vzdělání: {{ $osetrovatel->vzdelani }} <br/>
        Titul: {{ $osetrovatel->titul }} <br/>
        @level(3)
        Rodné číslo: {{ $osetrovatel->rodneCislo }} <br/>
        @endlevel

        @if(Auth::user()->idOsetrovatele === $osetrovatel->id)
        {{-- TODO proč je na konic routy question mark?--}}
        {{ Form::open(['method' => 'GET', 'route' => ['osetrovatele.edit', $osetrovatel->id]]) }}
        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
        @endif

        @if(Auth::user()->idOsetrovatele !== $osetrovatel->id)
        @level(3)
                {{-- TODO proč je na konic routy question mark?--}}
                {{ Form::open(['method' => 'GET', 'route' => ['osetrovatele.edit', $osetrovatel->id]]) }}
                {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
                {{ Form::close() }}
        @endlevel
        @endif

        @if(!$osetrovatelMaSkoleni->isEmpty())
                <hr>
                <h4>Seznam školení ošetřovatele:</h4>
                @foreach($osetrovatelMaSkoleni as $jednoOsetrovatelMaSkoleni)
                        @foreach($skoleni as $jednoSkoleni)
                                @if($jednoOsetrovatelMaSkoleni->idSkoleni === $jednoSkoleni->id)
                                        <a href="{{url('/skoleni'). '/' . $jednoSkoleni->id}}">
                                                {{ $jednoSkoleni->id }} - {{ $jednoSkoleni->datumSkoleni }} </br>
                                        </a>
                                        @break
                                @endif
                        @endforeach
                @endforeach
        @endif

        @if(Auth::user()->idOsetrovatele !== $osetrovatel->id)
                @if($showMakeHlOButton == true)
                        @level(3)
                        <hr>
                        <form action="{{url('/setHlavniOsetrovatel'). '/' . $osetrovatel->id}}">
                                <input class="button btn-primary" type="submit" value="NASTAV HLAVNÍHO OŠETŘOVATELE" />
                        </form>
                        @endlevel
                @else
                        @level(3)
                        <hr>
                        <form action="{{url('/unsetHlavniOsetrovatel'). '/' . $osetrovatel->id}}">
                                <input class="button btn-primary" type="submit" value="ODNASTAV HLAVNÍHO OŠETŘOVATELE" />
                        </form>
                        @endlevel
                @endif
        @endif

        <hr>

        @level(3)
                <form action="{{url('/osetrovatele')}}">
                        <input class="button btn-primary" type="submit" value="Zpět k ošetřovatelům" />
                </form>
        @endlevel
@endsection
