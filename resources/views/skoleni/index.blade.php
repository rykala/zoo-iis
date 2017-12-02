@extends('layout')

@section('content')
    <h1 class="list-header">Seznam školení</h1>

    <div class="list">
        @foreach($skoleni as $jednoSkoleni)
            <div class="list-item">
                <a class="list-href" href="{{url('/skoleni'). '/' . $jednoSkoleni->id}}">
                    {{ $jednoSkoleni->id }} - {{ $jednoSkoleni->datumSkoleni }}
                </a>
                @level(2)
                {{ Form::open(['method' => 'DELETE', 'route' => ['skoleni.destroy', $jednoSkoleni->id], 'onsubmit' => 'return ConfirmDelete()']) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger list-delete']) }}
                {{ Form::close() }}
                @endlevel
            </div>
        @endforeach
    </div>

    @level(2)
    <a href="{{url('/skoleni/create')}}" class="btn btn-primary">
        + Přidat školení
    </a>
    @endlevel

@endsection
