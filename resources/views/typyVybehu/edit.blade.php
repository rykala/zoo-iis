@extends('layout')

@section('content')

  <h1>Uprav Typ výběhu</h1>

  <hr>

  <form method="POST" action="/typyVybehu/{{$typVybehu->id}}">
      {{csrf_field()}}
      {{-- browser nebere patch REST Api -> pouzijeme POST a nastavime method_field na PATCH na naroutovani --}}
      {{ method_field('PATCH') }}
      <div class="form-group">
          <label for="nazev">Název</label>
          <input type="text" class="form-control" id="nazev" name="nazev" value="{{ $typVybehu->nazev }}" maxlength="20" required>
      </div>

      <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="/typyVybehu">
      <input class="button btn-primary" type="submit" value="Zpět k typům výběhů" />
  </form>



@endsection