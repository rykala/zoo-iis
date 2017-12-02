@extends('layout')

@section('content')

  <h1 class="list-header">Vytvoř ošetřovatele</h1>

  <form method="POST" action="{{url('/osetrovatele')}}">
      {{ csrf_field() }}
      {{-- REGISTRACE --}}
      <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
          <label for="email" class="col-md-4 control-label">E-mail<span style="color: red;">*</span></label>

          <div class="col-md-6">
              <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" required>

              @if ($errors->has('email'))
                  <span class="help-block">
                        <strong>{{ $errors->first('email') }}</strong>
                    </span>
              @endif
          </div>
      </div>

      <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
          <label for="password" class="col-md-4 control-label">Heslo<span style="color: red;">*</span></label>

          <div class="col-md-6">
              <input id="password" type="password" class="form-control" name="password" required>

              @if ($errors->has('password'))
                  <span class="help-block">
                    <strong>{{ $errors->first('password') }}</strong>
                </span>
              @endif
          </div>
      </div>

      <div class="form-group">
          <label for="password-confirm" class="col-md-4 control-label">Potvrďte heslo<span style="color: red;">*</span></label>

          <div class="col-md-6">
              <input id="password-confirm" type="password" class="form-control" name="password_confirmation" required>
          </div>
      </div>
      <hr>

      {{-- SAMOTNÝ OŠETŘOVATEL --}}
      <div class="form-group">
          <label for="rodneCislo"><span style="color: red; display:block; float:right">*</span>Rodné číslo</label>
          <input type="number" class="form-control" id="rodneCislo" name="rodneCislo" maxlength="11" value="{{ old('rodneCislo') }}" required>
      </div>
      <div class="form-group">
          <label for="jmeno"><span style="color: red; display:block; float:right">*</span>Jméno</label>
          <input type="text" class="form-control" id="jmeno" name="jmeno" maxlength="20" value="{{ old('jmeno') }}" required>
      </div>

      <div class="form-group">
          <label for="prijmeni"><span style="color: red; display:block; float:right">*</span>Přijmení</label>
          <input type="text" class="form-control" id="prijmeni" name="prijmeni" maxlength="20" value="{{ old('prijmeni') }}" required>
      </div>
      <div class="form-group">
          <label for="vzdelani"><span style="color: red; display:block; float:right">*</span>Vzdělání</label>
          <input type="text" class="form-control" id="vzdelani" name="vzdelani" maxlength="20" value="{{ old('vzdelani') }}" required>
      </div>
      <div class="form-group">
          <label for="titul"><span style="color: red; display:block; float:right">*</span>Titul</label>
          <input type="text" class="form-control" id="titul" name="titul" maxlength="10" value="{{ old('titul') }}" required>
      </div>

      <div class="form-group">
          <button type="submit" class="btn btn-primary">Vytvořit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="{{url('/osetrovatele')}}">
      <input class="btn btn-primary" type="submit" value="Zpět k ošetřovatelům" />
  </form>


@endsection
