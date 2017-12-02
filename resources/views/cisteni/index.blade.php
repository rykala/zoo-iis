@extends('layout')

@section('content')

    @foreach($cisteni as $jednoCisteni)
        <li>
            <a href="{{url('/cisteni/') . '/' . $jednoCisteni->id }}">
                {{ $jednoCisteni->id }} - {{ $jednoCisteni->idVybehu }} výběh v {{ $jednoCisteni->casCisteni }}
            </a>
            @level(2)
            {{ Form::open(['method' => 'DELETE', 'route' => ['cisteni.destroy', $jednoCisteni->id], 'onsubmit' => 'return ConfirmDelete()']) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
            @endlevel
        </li>
        <br/>
    @endforeach
    
    @level(2)
    <a href="{{url('/cisteni/create')}}">
        <span class="glyphicon glyphicon-plus"></span>
    </a>
    @endlevel

@endsection
