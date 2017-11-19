@extends('layout')

@section('content')

  <h1>Vytvoř zvíře</h1>

  <hr>

  <form method="POST" action="/zvirata">
      {{ csrf_field() }}
      <div class="form-group">
          <label for="zemePuvodu">Země původu</label>
          <input type="text" class="form-control" id="zemePuvodu" name="zemePuvodu" maxlength="20" required>
      </div>
      <div class="form-group">
          <label for="oblastVyskytu">Oblast výskytu</label>
          <input type="text" class="form-control" id="oblastVyskytu" name="oblastVyskytu" maxlength="20" required>
      </div>
      <div class="form-group">
          <label for="rodici">Rodiče</label>
          <input type="text" class="form-control" id="rodici" name="rodici" maxlength="30" required>
      </div>
      <div class="form-group">
          <label for="datumNarozeni">Datum narození</label>
          <input type="date" class="form-control" id="datumNarozeni" name="datumNarozeni" required>
      </div>
      <div class="form-group">
          <label for="datumUmrti">Datum úmrtí</label>
          <input type="date" class="form-control" id="datumUmrti" name="datumUmrti" required>
      </div>
      {{--TODO @iss všechny tyhle IDčka se musí naselectovat--}}
      <div class="form-group">
          <label for="idDruhu">Druh</label>
          <select class="form-control" name="idDruhu">
              @foreach($druhy as $druh)
                  <option value="{{$druh->id}}">{{$druh->nazev}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group">
          <label for="idVybehu">Výběh</label>
          <select class="form-control" name="idVybehu">
              @foreach($vybehy as $vybeh)
                  <option value="{{$vybeh->id}}">{{$vybeh->id}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group">
          <label for="casKrmeni">Čas krmení</label>
          <input type="number" class="form-control" id="casKrmeni" name="casKrmeni" maxlength="11" required>
      </div>

      <div class="form-group">
          <label for="mnozstviZradla">Množství žrádla</label>
          <input type="number" class="form-control" id="mnozstviZradla" name="mnozstviZradla" maxlength="11" required>
      </div>

      <div class="form-group">
          <label for="idOsetrovatele">Ošetřovatel</label>
          <select class="form-control" name="idOsetrovatele">
              @foreach($osetrovatele as $osetrovatel)
                  <option value="{{$osetrovatel->id}}">{{$osetrovatel->jmeno}} {{$osetrovatel->prijmeni}}</option>
              @endforeach
          </select>
      </div>

      <div class="form-group">
        <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="/zvirata/">
      <input class="button btn-primary" type="submit" value="Zpět k zvířatům" />
  </form>


@endsection
