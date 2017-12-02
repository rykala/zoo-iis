@extends('layout')

@section('content')

    @foreach($zvirata as $zvire)
        <li>
            <a href="{{url('/zvirata'). '/' . $zvire->id }}">
                {{ $zvire->jmeno }}
            </a>
            {{ Form::open(['method' => 'DELETE', 'route' => ['zvirata.destroy', $zvire->id], 'onsubmit' => 'return ConfirmDelete()']) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
        </li>
        <br/>
    @endforeach

    @level(2)
    <a href="{{url('/zvirata/create')}}">
        <span class="glyphicon glyphicon-plus"></span>
    </a>
    @endlevel

@endsection
