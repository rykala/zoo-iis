@extends('layout')

@section('content')
        <h1>{{ $osetrovatel->jmeno }} {{ $osetrovatel->prijmeni }}</h1>
        Vzdělání: {{ $osetrovatel->vzdelani }} <br/>
        Titul: {{ $osetrovatel->titul }}

        {{-- TODO proč je na konic routy question mark?--}}
        {{ Form::open(['method' => 'GET', 'route' => ['osetrovatele.edit', $osetrovatel->id]]) }}
        {{ Form::submit('Edit', ['class' => 'btn btn-primary']) }}
        {{ Form::close() }}

        <hr>

        <form action="/osetrovatele/">
                <input class="button btn-primary" type="submit" value="Zpět k ošetřovatelům" />
        </form>
@endsection
