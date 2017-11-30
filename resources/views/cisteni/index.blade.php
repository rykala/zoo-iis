@extends('layout')

@section('content')

    @foreach($cisteni as $jednoCisteni)
        <li>
            <a href="{{url('/cisteni/') . '/' . $jednoCisteni->id }}">
                {{ $jednoCisteni->id }} - {{ $jednoCisteni->idVybehu }} výběh v {{ $jednoCisteni->casCisteni }}
            </a>
            @level(2)
            {{ Form::open(['method' => 'DELETE', 'route' => ['cisteni.destroy', $jednoCisteni->id]]) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
            @endlevel
        </li>
        <br/>
    @endforeach

    {{--TODO @iis tohle tu musi byt kvůli tlačítku - nestaci to dát do layoutu - proč?--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    @level(2)
    <a href="{{url('/cisteni/create')}}">
        <span class="glyphicon glyphicon-plus"></span>
    </a>
    @endlevel

@endsection
