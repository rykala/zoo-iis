@extends('layout')

@section('content')

  <h1>Uprav školení</h1>

  <hr>

  <form method="POST" action="/skoleni/{{$skoleni->id}}">
      {{ csrf_field() }}
      {{-- browser nebere patch REST Api -> pouzijeme POST a nastavime method_field na PATCH na naroutovani --}}
      {{ method_field('PATCH') }}
      <div class="form-group">
          <label for="idOsetrovatele">Ošetřovatel</label>
          <select class="form-control" name="idOsetrovatele">
              @foreach($osetrovatele as $jedenOsetrovatel)
                  @if ($osetrovatel->id === $jedenOsetrovatel->id)
                      <option value="{{$jedenOsetrovatel->id}}" selected>{{$jedenOsetrovatel->jmeno}} {{$jedenOsetrovatel->prijmeni}}</option>
                  @else
                      <option value="{{$jedenOsetrovatel->id}}">{{$jedenOsetrovatel->jmeno}} {{$jedenOsetrovatel->prijmeni}}</option>

                  @endif
              @endforeach
          </select>
      </div>
      <div class="form-group">
          <label for="idVybehu">Výběh</label>
          <select class="form-control" name="idVybehu">
              <option disabled selected value> -- vyberte výběh -- </option>
              @foreach($vybehy as $jedenVybeh)
                  @if(!is_null($vybeh))
                      @if ($vybeh->id === $jedenVybeh->id)
                          <option value="{{$jedenVybeh->id}}" selected>{{$jedenVybeh->id}}</option>
                      @else
                          <option value="{{$jedenVybeh->id}}">{{$jedenVybeh->id}}</option>
                      @endif
                  @else
                      <option value="{{$jedenVybeh->id}}">{{$jedenVybeh->id}}</option>
                  @endif
              @endforeach
          </select>
      </div>
      <div class="form-group">
          <label for="idDruhuZvirete">Druh zvířete</label>
          <select class="form-control" name="idDruhuZvirete">
              <option disabled selected value> -- vyberte druh zvířete -- </option>
              @foreach($druhyZvirat as $druh)
                  @if(!is_null($druh))
                      @if ($druhZvirete->id === $druh->id)
                          <option value="{{$druh->id}}" selected>{{$druh->nazev}}</option>
                      @else
                          <option value="{{$druh->id}}">{{$druh->nazev}}</option>
                      @endif
                  @else
                      <option value="{{$druh->id}}">{{$druh->nazev}}</option>
                  @endif
              @endforeach
          </select>
      </div>
      <div class="form-group">
          <label for="datumSkoleni">Datum školení</label>
          <input id="datepicker" type="text" class="form-control" id="datumSkoleni" name="datumSkoleni" value="{{$skoleni->datumSkoleni}}" maxlength="20" required>
      </div>



      <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="/skoleni/{{ $skoleni->id }}">
      <input class="button btn-primary" type="submit" value="Zpět ke školení" />
  </form>



@endsection

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>