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

    @level(3)
        <a href="{{url('/osetrovatele/create')}}">
            <span class="glyphicon glyphicon-plus"></span>
        </a>
    @endlevel



@endsection
