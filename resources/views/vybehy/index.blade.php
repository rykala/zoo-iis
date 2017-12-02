@extends('layout')

@section('content')

    @foreach($vybehy as $vybeh)
        <li>
            <a href="{{url('/vybehy'). '/' . $vybeh->id }}">
                @foreach($typyVybehu as $typ)
                    @if($vybeh->idTypuVybehu === $typ->id)
                        {{ $vybeh->id }} - {{$typ->nazev}}
                    @endif
                @endforeach
            </a>
            @level(3)
            {{ Form::open(['method' => 'DELETE', 'route' => ['vybehy.destroy', $vybeh->id], 'onsubmit' => 'return ConfirmDelete()']) }}
            {{ Form::submit('Delete', ['class' => 'btn btn-danger']) }}
            {{ Form::close() }}
            @endlevel
        </li>
        <br/>
    @endforeach

    @level(3)
    <a href="{{url('/vybehy/create')}}">
        <span class="glyphicon glyphicon-plus"></span>
    </a>
    @endlevel

@endsection
