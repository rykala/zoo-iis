@extends('layout')

@section('content')

    @foreach($skoleni as $jednoSkoleni)
        <li>
            <a href="{{url('/skoleni'). '/' . $jednoSkoleni->id}}">
                {{ $jednoSkoleni->id }} - {{ $jednoSkoleni->datumSkoleni }}
            </a>
            @level(2)
            {{ Form::open(['method' => 'DELETE', 'route' => ['skoleni.destroy', $jednoSkoleni->id], 'onsubmit' => 'return ConfirmDelete()']) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
            @endlevel
        </li>
        <br/>
    @endforeach

    @level(2)
    <a href="{{url('/skoleni/create')}}">
        <span class="glyphicon glyphicon-plus"></span>
    </a>
    @endlevel

@endsection
