@extends('layout')

@section('content')

  <h1>Vytvoř typ výběhu</h1>

  <hr>

  <form method="POST" action="{{url('/typyVybehu')}}">
      {{ csrf_field() }}
      <div class="form-group">
          <label for="nazev"><span style="color: red; display:block; float:right">*</span>Název</label>
          <input type="text" class="form-control" id="nazev" name="nazev" maxlength="20" required>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="{{url('/typyVybehu')}}">
      <input class="button btn-primary" type="submit" value="Zpět k typům výběhů" />
  </form>

@endsection
