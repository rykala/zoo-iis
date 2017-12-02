@extends('layout')

@section('content')

  <h1 class="list-header">Uprav výběh</h1>

  <form method="POST" action="{{url('/vybehy'). '/' . $vybeh->id}}">
      {{csrf_field()}}
      {{-- browser nebere patch REST Api -> pouzijeme POST a nastavime method_field na PATCH na naroutovani --}}
      {{ method_field('PATCH') }}
      <div class="form-group">
          <label for="potrebnyCas"><span style="color: red; display:block; float:right">*</span>Potřebný čas na čištění (minuty)</label>
          <input type="number" class="form-control" id="potrebnyCas" name="potrebnyCas" value="{{ $vybeh->potrebnyCas }}" maxlength="11" required>
      </div>
      <div class="form-group">
          <label for="pomucky"><span style="color: red; display:block; float:right">*</span>Pomůcky</label>
          <input type="text" class="form-control" id="pomucky" name="pomucky" value="{{ $vybeh->pomucky }}" maxlength="30" required>
      </div>
      <div class="form-group">
          <label for="maxKapacita"><span style="color: red; display:block; float:right">*</span>Maximální kapacita zvířat</label>
          <input type="number" class="form-control" id="maxKapacita" name="maxKapacita" value="{{ $vybeh->maxKapacita }}" maxlength="11" required>
      </div>
      <div class="form-group">
          <label for="pocetPotrebnychOsetrovatelu"><span style="color: red; display:block; float:right">*</span>Počet potřebných ošetřovatelů</label>
          <input type="number" class="form-control" id="pocetPotrebnychOsetrovatelu" name="pocetPotrebnychOsetrovatelu" value="{{ $vybeh->pocetPotrebnychOsetrovatelu }}" maxlength="20" required>
      </div>
      <div class="form-group">
          <label for="idTypuVybehu"><span style="color: red; display:block; float:right">*</span>Typ výběhu</label>
          <select class="form-control" name="idTypuVybehu">
              @foreach($typyVybehu as $typVybehu)
                  @if ($typVybehu->id === $vybeh->idTypuVybehu)
                    <option value="{{$typVybehu->id}}" selected>{{$typVybehu->nazev}}</option>
                  @else
                      <option value="{{$typVybehu->id}}">{{$typVybehu->nazev}}</option>
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

  <form action="{{url('/vybehy'). '/' . $vybeh->id}}">
      <input class="btn btn-primary" type="submit" value="Zpět k výběhu" />
  </form>
@endsection