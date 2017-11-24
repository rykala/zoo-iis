@extends('layout')

@section('content')

    <h1>Vytvoř nový záznam o školení</h1>

    <hr>

    <form method="POST" action="/skoleni">
        {{ csrf_field() }}
        <div class="form-group">
            <label for="idOsetrovatele">Ošetřovatel</label>
            <select class="form-control" name="idOsetrovatele">
                @foreach($osetrovatele as $osetrovatel)
                    <option value="{{$osetrovatel->id}}">{{$osetrovatel->jmeno}} {{$osetrovatel->prijmeni}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="idVybehu">Výběh</label>
            <select class="form-control" name="idVybehu">
                <option disabled selected value> -- vyberte výběh -- </option>
                @foreach($vybehy as $vybeh)
                    <option value="{{$vybeh->id}}">{{$vybeh->id}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="idDruhuZvirete">Druh zvířete</label>
            <select class="form-control" name="idDruhuZvirete">
                <option disabled selected value> -- vyberte druh zvířete -- </option>
                @foreach($druhyZvirat as $druh)
                    <option value="{{$druh->id}}">{{$druh->nazev}}</option>
                @endforeach
            </select>
        </div>
        <div class="form-group">
            <label for="datumSkoleni">Datum školení</label>
            <input id="datepicker" type="text" class="form-control" id="datumSkoleni" name="datumSkoleni" maxlength="20" required>
        </div>



        <div class="form-group">
            <button type="submit" class="btn btn-primary">Submit</button>
        </div>

        @include('layouts.errors')

    </form>

    <hr>

    <form action="/skoleni/">
        <input class="button btn-primary" type="submit" value="Zpět ke školením" />
    </form>


@endsection

<script src="//code.jquery.com/jquery-1.10.2.js"></script>
<script src="//code.jquery.com/ui/1.11.2/jquery-ui.js"></script>
<script>
    $(function() {
        $( "#datepicker" ).datepicker();
    });
</script>