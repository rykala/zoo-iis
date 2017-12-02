@extends('layout')

@section('content')
    <h1 class="list-header">Seznam druhů zvířat</h1>

    <div class="list">
        @foreach($druhyZvirat as $druhZvirete)
            <div class="list-item">
                <a class="list-href" href="{{url('/druhyZvirat'). '/' .$druhZvirete->id}}">
                    {{ $druhZvirete->nazev }}
                </a>
                @level(2)
                {{ Form::open(['method' => 'DELETE', 'route' => ['druhyZvirat.destroy', $druhZvirete->id], 'onsubmit' => 'return ConfirmDelete()']) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger list-delete']) }}
                {{ Form::close() }}
                @endlevel
            </div>
        @endforeach
    </div>

    @level(2)
    <a href="{{url('/druhyZvirat/create')}}" class="btn btn-primary">
        + Přidat druh zvířete
    </a>
    @endlevel

@endsection
