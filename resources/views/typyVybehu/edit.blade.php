@extends('layout')

@section('content')

  <h1 class="list-header">Uprav Typ výběhu</h1>

  <form method="POST" action="{{url('/typyVybehu'). '/' . $typVybehu->id}}">
      {{csrf_field()}}
      {{-- browser nebere patch REST Api -> pouzijeme POST a nastavime method_field na PATCH na naroutovani --}}
      {{ method_field('PATCH') }}
      <div class="form-group">
          <label for="nazev"><span style="color: red; display:block; float:right">*</span>Název</label>
          <input type="text" class="form-control" id="nazev" name="nazev" value="{{ $typVybehu->nazev }}" maxlength="20" required>
      </div>

      <div class="form-group">
          <button type="submit" class="btn btn-primary">Uložit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="{{url('/typyVybehu')}}">
      <input class="btn btn-primary" type="submit" value="Zpět k typům výběhů" />
  </form>

@endsection