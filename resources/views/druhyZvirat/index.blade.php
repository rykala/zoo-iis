@extends('layout')

@section('content')

    @foreach($druhyZvirat as $druhZvirete)
        <li>
            <a href="/druhyZvirat/{{ $druhZvirete->id }}/edit">
                {{ $druhZvirete->nazev }}
            </a>
            {{ Form::open(['method' => 'DELETE', 'route' => ['druhyZvirat.destroy', $druhZvirete->id]]) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
        </li>
        <br/>
    @endforeach

    {{--TODO @iis tohle tu musi byt kvůli tlačítku - nestaci to dát do layoutu - proč?--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    <a href="/druhyZvirat/create">
        <span class="glyphicon glyphicon-plus"></span>
    </a>

@endsection
