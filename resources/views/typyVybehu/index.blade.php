@extends('layout')

@section('content')
    <h1 class="list-header">Seznam typů výběhů</h1>

    <div class="list">
        @foreach($typyVybehu as $typVybehu)
            <div class="list-item">
                <a class="list-href" href="{{url('/typyVybehu'). '/' . $typVybehu->id . '/edit'}}">
                    {{ $typVybehu->nazev }}
                </a>
                @level(3)
                {{ Form::open(['method' => 'DELETE', 'route' => ['typyVybehu.destroy', $typVybehu->id], 'onsubmit' => 'return ConfirmDelete()']) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger list-delete']) }}
                {{ Form::close() }}
                @endlevel
            </div>
        @endforeach
    </div>

    @level(3)
    <a href="{{url('/typyVybehu/create')}}" class="btn btn-primary">
        + Přidat typ výběhu
    </a>
    @endlevel

@endsection
