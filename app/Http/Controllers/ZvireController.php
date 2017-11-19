<?php

namespace App\Http\Controllers;

use App\DruhZvirete;
use App\Osetrovatel;
use App\Vybeh;
use App\Zvire;
use Illuminate\Http\Request;

class ZvireController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $zvirata = Zvire::all();

        return view('zvirata.index', compact('zvirata'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $druhy = DruhZvirete::all(['id', 'nazev']);
        $vybehy = Vybeh::all(['id']);
        $osetrovatele = Osetrovatel::all(['id', 'jmeno', 'prijmeni']);

        return view('zvirata.create', compact('druhy', 'vybehy', 'osetrovatele'));
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        $this->validate(request(), [
            'zemePuvodu' => 'required|max:20',
            'oblastVyskytu' => 'required|max:20',
            'rodici' => 'required|max:20',
            'datumNarozeni' => 'required',
            'datumUmrti' => 'required',
            'idDruhu' => 'required|max:10',
            'idVybehu' => 'required|max:10',
            'casKrmeni' => 'required|max:11',
            'mnozstviZradla' => 'required|max:11',
            'idOsetrovatele' => 'required|max:10',
        ]);

        $id = Zvire::create([
            'zemePuvodu' => request('zemePuvodu'),
            'oblastVyskytu' => request('oblastVyskytu'),
            'rodici' => request('rodici'),
            'datumNarozeni' => request('datumNarozeni'),
            'datumUmrti' => request('datumUmrti'),
            'idDruhu' => request('idDruhu'),
            'idVybehu' => request('idVybehu'),
            'casKrmeni' => request('casKrmeni'),
            'mnozstviZradla' => request('mnozstviZradla'),
            'idOsetrovatele' => request('idOsetrovatele'),
        ])->id;

        return redirect()->action(
            'ZvireController@show', ['id' => $id]
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
        $zvire = Zvire::find($id);

        $druh = DruhZvirete::find($zvire->idDruhu);
        $osetrovatel = Osetrovatel::find($zvire->idOsetrovatele);

        return view('zvirata.show', compact('zvire','druh','vybeh','osetrovatel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $zvire = Zvire::find($id);

        $druhy = DruhZvirete::all(['id', 'nazev']);
        $vybehy = Vybeh::all(['id']);
        $osetrovatele = Osetrovatel::all(['id', 'jmeno', 'prijmeni']);

        return view('zvirata.edit', compact('zvire', 'druhy', 'vybehy', 'osetrovatele'));
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
            'zemePuvodu' => 'required|max:20',
            'oblastVyskytu' => 'required|max:20',
            'rodici' => 'required|max:20',
            'datumNarozeni' => 'required',
            'datumUmrti' => 'required',
            'idDruhu' => 'required|max:10',
            'idVybehu' => 'required|max:10',
            'casKrmeni' => 'required|max:11',
            'mnozstviZradla' => 'required|max:11',
            'idOsetrovatele' => 'required|max:10',
        ]);

        Zvire::where('id', $id)->update([
            'zemePuvodu' => request('zemePuvodu'),
            'oblastVyskytu' => request('oblastVyskytu'),
            'rodici' => request('rodici'),
            'datumNarozeni' => request('datumNarozeni'),
            'datumUmrti' => request('datumUmrti'),
            'idDruhu' => request('idDruhu'),
            'idVybehu' => request('idVybehu'),
            'casKrmeni' => request('casKrmeni'),
            'mnozstviZradla' => request('mnozstviZradla'),
            'idOsetrovatele' => request('idOsetrovatele'),
        ]);

        return redirect()->action(
            'ZvireController@show', ['id' => $id]
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
        Zvire::destroy($id);

        return redirect('zvirata');
    }
}
