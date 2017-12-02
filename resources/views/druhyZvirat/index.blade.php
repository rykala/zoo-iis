@extends('layout')

@section('content')

    @foreach($druhyZvirat as $druhZvirete)
        <li>
            <a href="{{url('/druhyZvirat'). '/' .$druhZvirete->id}}">
                {{ $druhZvirete->nazev }}
            </a>
            @level(2)
            {{ Form::open(['method' => 'DELETE', 'route' => ['druhyZvirat.destroy', $druhZvirete->id], 'onsubmit' => 'return ConfirmDelete()']) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
            @endlevel
        </li>
        <br/>
    @endforeach

    @level(2)
    <a href="{{url('/druhyZvirat/create')}}">
        <span class="glyphicon glyphicon-plus"></span>
    </a>
    @endlevel

@endsection
