@extends('layout')

@section('content')

    @foreach($zvirata as $zvire)
        <li>
            <a href="{{url('/zvirata'). '/' . $zvire->id }}">
                {{ $zvire->jmeno }}
            </a>
            {{ Form::open(['method' => 'DELETE', 'route' => ['zvirata.destroy', $zvire->id]]) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
        </li>
        <br/>
    @endforeach

    {{--TODO @iis tohle tu musi byt kvůli tlačítku - nestaci to dát do layoutu - proč?--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    @level(2)
    <a href="{{url('/zvirata/create')}}">
        <span class="glyphicon glyphicon-plus"></span>
    </a>
    @endlevel

@endsection
