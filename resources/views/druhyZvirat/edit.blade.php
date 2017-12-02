@extends('layout')

@section('content')

  <h1>Uprav druh zvířete</h1>

  <hr>

  <form method="POST" action="{{url('/druhyZvirat'). '/' .$druhZvirete->id}}">
      {{csrf_field()}}
      {{-- browser nebere patch REST Api -> pouzijeme POST a nastavime method_field na PATCH na naroutovani --}}
      {{ method_field('PATCH') }}
      <div class="form-group">
          <label for="nazev"><span style="color: red; display:block; float:right">*</span>Název</label>
          <input type="text" class="form-control" id="nazev" name="nazev" value="{{ $druhZvirete->nazev }}" maxlength="20" required>
      </div>

      <div class="form-group">
          <button type="submit" class="btn btn-primary">Submit</button>
      </div>

      @include('layouts.errors')

  </form>

  <hr>

  <form action="{{url('/druhyZvirat'). '/' .$druhZvirete->id}}">
      <input class="button btn-primary" type="submit" value="Zpět k druhu" />
  </form>



@endsection