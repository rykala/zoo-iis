@extends('layout')

@section('content')

    @foreach($vybehy as $vybeh)
        <li>
            <a href="/vybehy/{{ $vybeh->id }}">
                {{ $vybeh->id }}
            </a>
            {{ Form::open(['method' => 'DELETE', 'route' => ['vybehy.destroy', $vybeh->id]]) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
        </li>
        <br/>
    @endforeach

    {{--TODO @iis tohle tu musi byt kvůli tlačítku - nestaci to dát do layoutu - proč?--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <a href="/vybehy/create">
        <span class="glyphicon glyphicon-plus"></span>
    </a>

@endsection
