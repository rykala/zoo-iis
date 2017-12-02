@extends('layout')

@section('content')
    <h1 class="list-header">Seznam výběhů</h1>

    <div class="list">
        @foreach($vybehy as $vybeh)
            <div class="list-item">
                <a class="list-href" href="{{url('/vybehy'). '/' . $vybeh->id }}">
                    @foreach($typyVybehu as $typ)
                        @if($vybeh->idTypuVybehu === $typ->id)
                            {{ $vybeh->id }} - {{$typ->nazev}}
                        @endif
                    @endforeach
                </a>
                @level(3)
                    {{ Form::open(['method' => 'DELETE', 'route' => ['vybehy.destroy', $vybeh->id], 'onsubmit' => 'return ConfirmDelete()']) }}
                    {{ Form::submit('Delete', ['class' => 'btn btn-danger list-delete']) }}
                    {{ Form::close() }}
                @endlevel
            </div>
        @endforeach
    </div>

    @level(3)
    <a href="{{url('/vybehy/create')}}" class="btn btn-primary">
        + Přidat výběh
    </a>
    @endlevel

@endsection
