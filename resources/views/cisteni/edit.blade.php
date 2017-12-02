@extends('layout')

@section('content')

  <h1 class="list-header">Uprav čištění</h1>

  <form method="POST" action="{{url('/cisteni'). '/' . $cisteni->id}}">
      {{csrf_field()}}
      {{-- browser nebere patch REST Api -> pouzijeme POST a nastavime method_field na PATCH na naroutovani --}}
      {{ method_field('PATCH') }}
      <div class="form-group">
          <label for="idOsetrovatele"><span style="color: red; display:block; float:right">*</span>Ošetřovatel</label>
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
          <label for="idVybehu"><span style="color: red; display:block; float:right">*</span>Výběh</label>
          <select class="form-control" name="idVybehu">
              @foreach($vybehy as $jedenVybeh)
                  @if ($vybeh->id === $jedenVybeh->id)
                      <option value="{{$jedenVybeh->id}}" selected>{{$jedenVybeh->id}}</option>
                  @else
                      <option value="{{$jedenVybeh->id}}">{{$jedenVybeh->id}}</option>
                  @endif
              @endforeach
          </select>

      </div>
      <div class="form-group">
          <label for="casCisteni"><span style="color: red; display:block; float:right">*</span>Čas čištění</label>
          <select class="form-control" name="casCisteni">
              @foreach($casyCisteni as $cas)
                  <option value="{{$cas}}">{{$cas}}</option>
              @endforeach
          </select>
      </div>



      <div class="form-group">
          <button type="submit" class="btn btn-primary">Uložit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="{{url('/cisteni'). '/' . $cisteni->id}}">
      <input class="btn btn-primary" type="submit" value="Zpět k čištění" />
  </form>



@endsection