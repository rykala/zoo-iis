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

    {{--TODO @iis tohle tu musi byt kvůli tlačítku - nestaci to dát do layoutu - proč?--}}
    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css">

    @level(3)
    <a href="{{url('/vybehy/create')}}">
        <span class="glyphicon glyphicon-plus"></span>
    </a>
    @endlevel

@endsection
