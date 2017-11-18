@extends('layout')

@section('content')

  <h1>Vytvoř ošetřovatele</h1>

  <hr>

  <form method="POST" action="/osetrovatele">
      {{ csrf_field() }}
      <div class="form-group">
          <label for="rodneCislo">Rodné číslo</label>
          <input type="number" class="form-control" id="rodneCislo" name="rodneCislo" maxlength="11" required>
      </div>
      <div class="form-group">
          <label for="jmeno">Jméno</label>
          <input type="text" class="form-control" id="jmeno" name="jmeno" maxlength="20" required>
      </div>
      <div class="form-group">
          <label for="prijmeni">Přijmení</label>
          <input type="text" class="form-control" id="prijmeni" name="prijmeni" maxlength="20" required>
      </div>
      <div class="form-group">
          <label for="vzdelani">Vzdělání</label>
          <input type="text" class="form-control" id="vzdelani" name="vzdelani" maxlength="20" required>
      </div>
      <div class="form-group">
          <label for="titul">Titul</label>
          <input type="text" class="form-control" id="titul" name="titul" maxlength="10" required>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="/osetrovatele/">
      <input class="button btn-primary" type="submit" value="Zpět k ošetřovatelům" />
  </form>


@endsection
