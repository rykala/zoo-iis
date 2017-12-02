@extends('layout')

@section('content')

    @foreach($osetrovatele as $osetrovatel)
        <li>
            <a href="{{url('/osetrovatele') . '/' . $osetrovatel->id }}">
                {{ $osetrovatel->jmeno . ' ' . $osetrovatel->prijmeni }}
            </a>
            @level(2)
            {{ Form::open(['method' => 'DELETE', 'route' => ['osetrovatele.destroy', $osetrovatel->id], 'onsubmit' => 'return ConfirmDelete()']) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
            @endlevel

        </li>
        <br/>
    @endforeach

    {{--TODO @iis tohle tu musi byt kvůli tlačítku - nestaci to dát do layoutu - proč?--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    @level(3)
        <a href="{{url('/osetrovatele/create')}}">
            <span class="glyphicon glyphicon-plus"></span>
        </a>
    @endlevel



@endsection
