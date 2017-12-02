@extends('layout')

@section('content')

    @foreach($typyVybehu as $typVybehu)
        <li>
            <a href="{{url('/typyVybehu'). '/' . $typVybehu->id . '/edit'}}">
                {{ $typVybehu->nazev }}
            </a>
            @level(3)
            {{ Form::open(['method' => 'DELETE', 'route' => ['typyVybehu.destroy', $typVybehu->id], 'onsubmit' => 'return ConfirmDelete()']) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
            @endlevel
        </li>
        <br/>
    @endforeach

    @level(3)
    <a href="{{url('/typyVybehu/create')}}">
        <span class="glyphicon glyphicon-plus"></span>
    </a>
    @endlevel

@endsection
