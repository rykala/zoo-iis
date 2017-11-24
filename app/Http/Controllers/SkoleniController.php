<?php

namespace App\Http\Controllers;

use App\DruhZvirete;
use App\Osetrovatel;
use App\OsetrovatelMaSkoleni;
use App\Skoleni;
use App\SkoleniNaVybeh;
use App\SkoleniNaZvire;
use App\TypVybehu;
use App\Vybeh;
use App\Zvire;
use DateTime;
use Illuminate\Http\Request;

class SkoleniController extends Controller
{
    public function __construct()
    {
        $this->middleware('auth'); // např. ['only' => 'index'], or except
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $skoleni = Skoleni::all();

        return view('skoleni.index', compact('skoleni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $druhyZvirat = DruhZvirete::all(['id', 'nazev']);
        $vybehy = Vybeh::all(['id']);
        $osetrovatele = Osetrovatel::all(['id', 'jmeno', 'prijmeni']);

        return view('skoleni.create', compact('druhyZvirat', 'vybehy', 'osetrovatele'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
//        dd(request('datumSkoleni'));
        $this->validate(request(), [
            'idOsetrovatele' => 'required|max:10',
            'idVybehu' => 'max:10',
            'idZvirete' => 'max:10',
            'datumSkoleni' => 'required|date',//|date_format:mm/dd/yyyy',
        ]);

        $idSkoleniNaVybeh = null;
        if (request('idVybehu')) {
            $idSkoleniNaVybeh = SkoleniNaVybeh::create([
                'idVybehu' => request('idVybehu'),
            ])->id;
        }

        $idSkoleniNaZvire = null;
        if (request('idDruhuZvirete')) {
            $idSkoleniNaZvire = SkoleniNaZvire::create([
                'idDruhu' => request('idDruhuZvirete'),
            ])->id;
        }

        $date = new DateTime(request('datumSkoleni'));

        $idSkoleni = Skoleni::create([
            'datumSkoleni' => $date,
            'idSkoleniNaZvire' => $idSkoleniNaZvire,
            'idSkoleniNaVybeh' => $idSkoleniNaVybeh,
        ])->id;

        OsetrovatelMaSkoleni::create([
            'idOsetrovatele' => request('idOsetrovatele'),
            'idSkoleni' => $idSkoleni,
        ]);

        return redirect()->action(
            'SkoleniController@show', ['id' => $idSkoleni]
        );
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $skoleni = Skoleni::find($id);

        $vybeh = null;
        if ($skoleni->idSkoleniNaVybeh !== NULL) {
            $skoleniNaVybeh = SkoleniNaVybeh::find($skoleni->idSkoleniNaVybeh);
            $vybeh = Vybeh::find($skoleniNaVybeh->idVybehu);
        }

        $druhZvirete = null;
        if ($skoleni->idSkoleniNaZvire !== NULL) {
            $skoleniNaZvire = SkoleniNaZvire::find($skoleni->idSkoleniNaZvire);
            $druhZvirete = DruhZvirete::find($skoleniNaZvire->idDruhu);
        }

        $osetrovatelMaSkoleni = OsetrovatelMaSkoleni::where('idSkoleni', $id)->get()[0];
        $osetrovatel = Osetrovatel::find($osetrovatelMaSkoleni->idOsetrovatele);


        return view('skoleni.show', compact('skoleni', 'vybeh', 'druhZvirete', 'osetrovatel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $druhyZvirat = DruhZvirete::all(['id', 'nazev']);
        $vybehy = Vybeh::all(['id']);
        $osetrovatele = Osetrovatel::all(['id', 'jmeno', 'prijmeni']);

        $skoleni = Skoleni::find($id);

        $vybeh = null;
        if ($skoleni->idSkoleniNaVybeh !== NULL) {
            $skoleniNaVybeh = SkoleniNaVybeh::find($skoleni->idSkoleniNaVybeh);
            $vybeh = Vybeh::find($skoleniNaVybeh->idVybehu);
        }

        $druhZvirete = null;
        if ($skoleni->idSkoleniNaZvire !== NULL) {
            $skoleniNaZvire = SkoleniNaZvire::find($skoleni->idSkoleniNaZvire);
            $druhZvirete = DruhZvirete::find($skoleniNaZvire->idDruhu);
        }

        $osetrovatelMaSkoleni = OsetrovatelMaSkoleni::where('idSkoleni', $id)->get()[0];
        $osetrovatel = Osetrovatel::find($osetrovatelMaSkoleni->idOsetrovatele);

        return view('skoleni.edit', compact('skoleni','druhyZvirat', 'vybehy', 'osetrovatele', 'vybeh', 'druhZvirete', 'osetrovatel'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        $this->validate(request(), [
            'idOsetrovatele' => 'required|max:10',
            'idVybehu' => 'max:10',
            'idZvirete' => 'max:10',
            'datumSkoleni' => 'required|date',//|date_format:mm/dd/yyyy',
        ]);

        $skoleni = Skoleni::find($id);

        if (request('idVybehu')) {
            $skoleniNaVybeh = SkoleniNaVybeh::find($skoleni->idSkoleniNaVybeh);
            SkoleniNaVybeh::where('id', $skoleniNaVybeh->id)->update([
                'idVybehu' => request('idVybehu'),
            ]);
        }

        if (request('idDruhuZvirete')) {
            $skoleniNaZvire = SkoleniNaZvire::find($skoleni->idSkoleniNaZvire);
            SkoleniNaZvire::where('id', $skoleniNaZvire->id)->update([
                'idDruhu' => request('idDruhuZvirete'),
            ]);
        }

        OsetrovatelMaSkoleni::where('idSkoleni', $id)->update([
            'idOsetrovatele' => request('idOsetrovatele'),
        ]);

        $date = new DateTime(request('datumSkoleni'));

        Skoleni::where('id', $id)->update([
            'datumSkoleni' => $date,
        ]);

        return redirect()->action(
            'SkoleniController@show', ['id' => $id]
        );
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $skoleni = Skoleni::find($id);

        if ($skoleni->idSkoleniNaVybeh !== NULL) {
            SkoleniNaVybeh::destroy($skoleni->idSkoleniNaVybeh);
        }

        if ($skoleni->idSkoleniNaZvire !== NULL) {
            SkoleniNaZvire::destroy($skoleni->idSkoleniNaZvire);
        }

        Skoleni::destroy($id);

        return redirect('skoleni');
    }
}
