@extends('layout')

@section('content')

  <h1 class="list-header">Uprav Zvíře</h1>

  <form method="POST" action="{{url('/zvirata'). '/' . $zvire->id}}">
      {{csrf_field()}}
      {{-- browser nebere patch REST Api -> pouzijeme POST a nastavime method_field na PATCH na naroutovani --}}
      {{ method_field('PATCH') }}
      <div class="form-group">
          <label for="jmeno"><span style="color: red; display:block; float:right">*</span>Jméno zvířete</label>
          <input type="text" class="form-control" id="jmeno" name="jmeno" value="{{ $zvire->jmeno }}" maxlength="40" required>
      </div>
      <div class="form-group">
          <label for="zemePuvodu"><span style="color: red; display:block; float:right">*</span>Země původu</label>
          <input type="text" class="form-control" id="zemePuvodu" name="zemePuvodu" value="{{ $zvire->zemePuvodu }}" maxlength="20" required>
      </div>
      <div class="form-group">
          <label for="oblastVyskytu"><span style="color: red; display:block; float:right">*</span>Oblast výskytu</label>
          <input type="text" class="form-control" id="oblastVyskytu" name="oblastVyskytu" value="{{ $zvire->oblastVyskytu }}" maxlength="20" required>
      </div>
      <div class="form-group">
          <label for="rodici">Rodiče</label>
          <input type="text" class="form-control" id="rodici" name="rodici" value="{{ $zvire->rodici }}" maxlength="30">
      </div>
      <div class="form-group">
          <label for="datumNarozeni"><span style="color: red; display:block; float:right">*</span>Datum narození</label>
          <input type="date" class="form-control" id="datumNarozeni" name="datumNarozeni" value="{{ $zvire->datumNarozeni }}" required>
      </div>
      <div class="form-group">
          <label for="datumUmrti">Datum úmrtí</label>
          <input type="date" class="form-control" id="datumUmrti" name="datumUmrti" value="{{ $zvire->datumUmrti }}">
      </div>

      <div class="form-group">
          <label for="idDruhu"><span style="color: red; display:block; float:right">*</span>Druh</label>
          <select class="form-control" name="idDruhu">
              @foreach($druhy as $druh)
                  @if ($druh->id === $zvire->idDruhu)
                      <option value="{{$druh->id}}" selected>{{$druh->nazev}}</option>
                  @else
                      <option value="{{$druh->id}}">{{$druh->nazev}}</option>
                  @endif
              @endforeach
          </select>
      </div>

      <div class="form-group">
          <label for="idVybehu"><span style="color: red; display:block; float:right">*</span>Výběh</label>
          <select class="form-control" name="idVybehu">
              @foreach($vybehy as $vybeh)
                  @if ($vybeh->id === $zvire->idVybehu)
                      <option value="{{$vybeh->id}}" selected>{{$vybeh->id}}</option>
                  @else
                      <option value="{{$vybeh->id}}">{{$vybeh->id}}</option>
                  @endif
              @endforeach
          </select>
      </div>

      <div class="form-group">
          <label for="casKrmeni"><span style="color: red; display:block; float:right">*</span>Čas krmení (v minutách)</label>
          <input type="number" class="form-control" id="casKrmeni" name="casKrmeni" value="{{ $zvire->casKrmeni }}" maxlength="11" required>
      </div>

      <div class="form-group">
          <label for="mnozstviZradla"><span style="color: red; display:block; float:right">*</span>Množství žrádla (v gramech)</label>
          <input type="number" class="form-control" id="mnozstviZradla" name="mnozstviZradla" value="{{ $zvire->mnozstviZradla }}" maxlength="11" required>
      </div>

      <div class="form-group">
          <label for="idOsetrovatele"><span style="color: red; display:block; float:right">*</span>Ošetřovatel</label>
          <select class="form-control" name="idOsetrovatele">
              @foreach($osetrovatele as $osetrovatel)
                  @if ($osetrovatel->id === $zvire->idOsetrovatele)
                      <option value="{{$osetrovatel->id}}" selected>{{$osetrovatel->jmeno}} {{$osetrovatel->prijmeni}}</option>
                  @else
                      <option value="{{$osetrovatel->id}}">{{$osetrovatel->jmeno}} {{$osetrovatel->prijmeni}}</option>
                  @endif
              @endforeach
          </select>
      </div>

      <div class="form-group">
          <button type="submit" class="btn btn-primary">Uložit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="{{url('/zvirata'). '/' . $zvire->id}}">
      <input class="btn btn-primary" type="submit" value="Zpět k zvířeti" />
  </form>

  <br>

@endsection