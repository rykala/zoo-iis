@extends('layout')

@section('content')
        <h1>{{ $osetrovatel->jmeno }} {{ $osetrovatel->prijmeni }}</h1>
        Vzdělání: {{ $osetrovatel->vzdelani }} <br/>
        Titul: {{ $osetrovatel->titul }}
@endsection
