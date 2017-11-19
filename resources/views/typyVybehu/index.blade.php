@extends('layout')

@section('content')

    @foreach($typyVybehu as $typVybehu)
        <li>
            <a href="/typyVybehu/{{ $typVybehu->id }}/edit">
                {{ $typVybehu->nazev }}
            </a>
            {{ Form::open(['method' => 'DELETE', 'route' => ['typyVybehu.destroy', $typVybehu->id]]) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
        </li>
        <br/>
    @endforeach

    {{--TODO @iis tohle tu musi byt kvůli tlačítku - nestaci to dát do layoutu - proč?--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <a href="/typyVybehu/create">
        <span class="glyphicon glyphicon-plus"></span>
    </a>

@endsection
