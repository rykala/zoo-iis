@extends('layout')

@section('content')
        <h1>{{ $druh->id }} {{ $druh->nazev }}</h1>

        @if(count($zvirata))
                <hr>
                Zvířata tohoto druhu: <br/>
                @foreach($zvirata as $zvire)
                        Zvíře: <a href="{{url('/zvirata'). '/' . $zvire->id }}">{{ $zvire->id }} - {{ $zvire->jmeno }}</a> <br/>
                @endforeach
                <hr>
        @endif

        @level(2)
        {{-- TODO proč je na konic routy question mark?--}}
        {{ Form::open(['method' => 'GET', 'route' => ['druhyZvirat.edit', $druh->id]]) }}
        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}
        <hr>
        @endlevel

        <form action="{{ url('/druhyZvirat') }}">
                <input class="button btn-primary" type="submit" value="Zpět k druhům zvířat" />
        </form>
@endsection
