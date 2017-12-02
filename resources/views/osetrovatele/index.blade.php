@extends('layout')

@section('content')
    <h1 class="list-header">Seznam ošetřovatelů</h1>

    <div class="list">
        @foreach($osetrovatele as $osetrovatel)
            <div class="list-item">
                <a class="list-href" href="{{url('/osetrovatele') . '/' . $osetrovatel->id }}">
                    {{ $osetrovatel->jmeno . ' ' . $osetrovatel->prijmeni }}
                </a>
                @level(2)
                {{ Form::open(['method' => 'DELETE', 'route' => ['osetrovatele.destroy', $osetrovatel->id], 'onsubmit' => 'return ConfirmDelete()']) }}
                {{ Form::submit('Delete', ['class' => 'btn btn-danger list-delete']) }}
                {{ Form::close() }}
                @endlevel
        </div>
        @endforeach
    </div>

    @level(3)
        <a href="{{url('/osetrovatele/create')}}" class="btn btn-primary">
            + Přidat ošetřovatele
        </a>
    @endlevel



@endsection
