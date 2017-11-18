@extends('layout')

@section('content')

  <h1>Uprav ošetřovatele</h1>

  <hr>

  <form method="POST" action="/osetrovatele/{{$osetrovatel->id}}">
      {{csrf_field()}}
      {{-- browser nebere patch REST Api -> pouzijeme POST a nastavime method_field na PATCH na naroutovani --}}
      {{ method_field('PATCH') }}
      <div class="form-group">
          <label for="rodneCislo">Rodné číslo</label>
          <input type="number" class="form-control" id="rodneCislo" name="rodneCislo" value="{{ $osetrovatel->rodneCislo }}" maxlength="11" required>
      </div>
      <div class="form-group">
          <label for="jmeno">Jméno</label>
          <input type="text" class="form-control" id="jmeno" name="jmeno" value="{{ $osetrovatel->jmeno }}" maxlength="20" required>
      </div>

      <div class="form-group">
          <label for="prijmeni">Přijmení</label>
          <input type="text" class="form-control" id="prijmeni" name="prijmeni" value="{{ $osetrovatel->prijmeni }}" maxlength="20" required>
      </div>
      <div class="form-group">
          <label for="vzdelani">Vzdělání</label>
          <input type="text" class="form-control" id="vzdelani" name="vzdelani" value="{{ $osetrovatel->vzdelani }}" maxlength="20" required>
      </div>
      <div class="form-group">
          <label for="titul">Titul</label>
          <input type="text" class="form-control" id="titul" name="titul" value="{{ $osetrovatel->titul }}" maxlength="10" required>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="/osetrovatele/{{ $osetrovatel->id }}">
      <input class="button btn-primary" type="submit" value="Zpět k ošetřovateli" />
  </form>
@endsection
