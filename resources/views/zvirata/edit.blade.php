@extends('layout')

@section('content')

  <h1>Uprav Zvíře</h1>

  <hr>

  <form method="POST" action="/zvirata/{{$zvire->id}}">
      {{csrf_field()}}
      {{-- browser nebere patch REST Api -> pouzijeme POST a nastavime method_field na PATCH na naroutovani --}}
      {{ method_field('PATCH') }}
      <div class="form-group">
          <label for="zemePuvodu">Země původu</label>
          <input type="text" class="form-control" id="zemePuvodu" name="zemePuvodu" value="{{ $zvire->zemePuvodu }}" maxlength="20" required>
      </div>
      <div class="form-group">
          <label for="oblastVyskytu">Oblast výskytu</label>
          <input type="text" class="form-control" id="oblastVyskytu" name="oblastVyskytu" value="{{ $zvire->oblastVyskytu }}" maxlength="20" required>
      </div>
      <div class="form-group">
          <label for="rodici">Rodiče</label>
          <input type="text" class="form-control" id="rodici" name="rodici" value="{{ $zvire->rodici }}" maxlength="30" required>
      </div>
      <div class="form-group">
          <label for="datumNarozeni">Datum narození</label>
          <input type="date" class="form-control" id="datumNarozeni" name="datumNarozeni" value="{{ $zvire->datumNarozeni }}" required>
      </div>
      <div class="form-group">
          <label for="datumUmrti">Datum úmrtí</label>
          <input type="date" class="form-control" id="datumUmrti" name="datumUmrti" value="{{ $zvire->datumUmrti }}" required>
      </div>
      {{--TODO @iss všechny tyhle IDčka se musí naselectovat--}}
      <div class="form-group">
          <label for="idDruhu">Druh</label>
          <input type="number" class="form-control" id="idDruhu" name="idDruhu" value="{{ $zvire->idDruhu }}" maxlength="10" required>
      </div>

      <div class="form-group">
          <label for="idVybehu">Výběh</label>
          <input type="number" class="form-control" id="idVybehu" name="idVybehu" value="{{ $zvire->idVybehu }}" maxlength="10" required>
      </div>

      <div class="form-group">
          <label for="casKrmeni">Čas krmení</label>
          <input type="number" class="form-control" id="casKrmeni" name="casKrmeni" value="{{ $zvire->casKrmeni }}" maxlength="11" required>
      </div>

      <div class="form-group">
          <label for="mnozstviZradla">Množství žrádla</label>
          <input type="number" class="form-control" id="mnozstviZradla" name="mnozstviZradla" value="{{ $zvire->mnozstviZradla }}" maxlength="11" required>
      </div>

      <div class="form-group">
          <label for="idOsetrovatele">Ošetřovatel</label>
          <input type="number" class="form-control" id="idOsetrovatele" name="idOsetrovatele" value="{{ $zvire->idOsetrovatele }}" maxlength="10" required>
      </div>

      <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="/zvirata/{{ $zvire->id }}">
      <input class="button btn-primary" type="submit" value="Zpět k zvířatu" />
  </form>



@endsection