@extends('layout')

@section('content')
    <h1 class="list-header">Seznam čištění</h1>

    <div class="list">
        @foreach($cisteni as $jednoCisteni)
            <div class="list-item">
                <a class="list-href" href="{{url('/cisteni/') . '/' . $jednoCisteni->id }}">
                    {{ $jednoCisteni->id }} - {{ $jednoCisteni->idVybehu }} výběh v {{ $jednoCisteni->casCisteni }}
                </a>
                @level(2)
                {{ Form::open(['method' => 'DELETE', 'route' => ['cisteni.destroy', $jednoCisteni->id], 'onsubmit' => 'return ConfirmDelete()']) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger list-delete']) }}
                {{ Form::close() }}
                @endlevel
            </div>
        @endforeach
    </div>
    
    @level(2)
    <a href="{{url('/cisteni/create')}}" class="btn btn-primary">
        + Přidat čištění
    </a>
    @endlevel

@endsection
