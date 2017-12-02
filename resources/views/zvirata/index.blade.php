@extends('layout')

@section('content')
    <h1 class="list-header">Seznam zvířat</h1>

    <div class="list">
        @foreach($zvirata as $zvire)
            <div class="list-item">
                <a class="list-href" href="{{url('/zvirata'). '/' . $zvire->id }}">
                    {{ $zvire->jmeno }}
                </a>
                {{ Form::open(['method' => 'DELETE', 'route' => ['zvirata.destroy', $zvire->id], 'onsubmit' => 'return ConfirmDelete()']) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger list-delete']) }}
                {{ Form::close() }}
            </div>
        @endforeach
    </div>

    @level(2)
    <a href="{{url('/zvirata/create')}}" class="btn btn-primary">
        + Přidat zvíře
    </a>
    @endlevel

@endsection
