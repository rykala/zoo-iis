@extends('layout')

@section('content')

  @if(Auth::user()->idOsetrovatele === $osetrovatel->id)

  <h1 class="list-header">Uprav svůj profil</h1>

  <form method="POST" action="{{url('/osetrovatele') . '/' . $osetrovatel->id }}">
      {{csrf_field()}}
      {{-- browser nebere patch REST Api -> pouzijeme POST a nastavime method_field na PATCH na naroutovani --}}
      {{ method_field('PATCH') }}
      <div class="form-group">
          <label for="rodneCislo"><span style="color: red; display:block; float:right">*</span>Rodné číslo</label>
          <input type="number" class="form-control" id="rodneCislo" name="rodneCislo" value="{{ $osetrovatel->rodneCislo }}" maxlength="11" required>
      </div>
      <div class="form-group">
          <label for="jmeno"><span style="color: red; display:block; float:right">*</span>Jméno</label>
          <input type="text" class="form-control" id="jmeno" name="jmeno" value="{{ $osetrovatel->jmeno }}" maxlength="20" required>
      </div>

      <div class="form-group">
          <label for="prijmeni"><span style="color: red; display:block; float:right">*</span>Přijmení</label>
          <input type="text" class="form-control" id="prijmeni" name="prijmeni" value="{{ $osetrovatel->prijmeni }}" maxlength="20" required>
      </div>
      <div class="form-group">
          <label for="vzdelani"><span style="color: red; display:block; float:right">*</span>Vzdělání</label>
          <input type="text" class="form-control" id="vzdelani" name="vzdelani" value="{{ $osetrovatel->vzdelani }}" maxlength="20" required>
      </div>
      <div class="form-group">
          <label for="titul"><span style="color: red; display:block; float:right">*</span>Titul</label>
          <input type="text" class="form-control" id="titul" name="titul" value="{{ $osetrovatel->titul }}" maxlength="10" required>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Uložit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

    @else
      @level(3)
      <h1 class="list-header">Uprav svůj profil</h1>

      <form method="POST" action="{{url('/osetrovatele') . '/' . $osetrovatel->id }}">
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
              <button type="submit" class="btn btn-primary">Uložit</button>
          </div>

          @include('layouts.errors')

      </form>

      <hr>
      @endlevel
      @if(Auth::check() && Auth::user()->level() <= 2)
          <h1>Nemáte oprávnění na editaci tohoto ošetřovatele</h1>
      @endif
    @endif


    <form action="{{url('/osetrovatele') . '/' . $osetrovatel->id }}">
      <input class="btn btn-primary" type="submit" value="Zpět k ošetřovateli" />
  </form>
@endsection
