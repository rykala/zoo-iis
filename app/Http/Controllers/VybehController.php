<?php

namespace App\Http\Controllers;

use App\TypVybehu;
use App\Vybeh;
use App\Zvire;
use Illuminate\Http\Request;

class VybehController extends Controller
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
        $vybehy = Vybeh::all();
        $typyVybehu = TypVybehu::all(['id', 'nazev']);

        return view('vybehy.index', compact('vybehy', 'typyVybehu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $typyVybehu = TypVybehu::all(['id', 'nazev']);

        return view('vybehy.create', compact('typyVybehu'));
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
            'potrebnyCas' => 'required|max:11',
            'pomucky' => 'required|max:30',
            'maxKapacita' => 'required|max:11',
            'pocetPotrebnychOsetrovatelu' => 'required|max:11',
            'idTypuVybehu' => 'required|max:10',
        ]);

        $id = Vybeh::create([
            'potrebnyCas' => request('potrebnyCas'),
            'pomucky' => request('pomucky'),
            'maxKapacita' => request('maxKapacita'),
            'pocetPotrebnychOsetrovatelu' => request('pocetPotrebnychOsetrovatelu'),
            'idTypuVybehu' => request('idTypuVybehu'),
        ])->id;

        return redirect()->action(
            'VybehController@show', ['id' => $id]
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
        $vybeh = Vybeh::find($id);

        $typVybehu = TypVybehu::find($vybeh->idTypuVybehu);
        $zvirata = Zvire::where('idVybehu', $id)->get();



        return view('vybehy.show', compact('vybeh', 'typVybehu', 'zvirata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $vybeh = Vybeh::find($id);
        $typyVybehu = TypVybehu::all(['id', 'nazev']);

        return view('vybehy.edit', compact('vybeh', 'typyVybehu'));
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
            'potrebnyCas' => 'required|max:11',
            'pomucky' => 'required|max:30',
            'maxKapacita' => 'required|max:11',
            'pocetPotrebnychOsetrovatelu' => 'required|max:11',
            'idTypuVybehu' => 'required|max:10',
        ]);

        Vybeh::where('id', $id)->update([
            'potrebnyCas' => request('potrebnyCas'),
            'pomucky' => request('pomucky'),
            'maxKapacita' => request('maxKapacita'),
            'pocetPotrebnychOsetrovatelu' => request('pocetPotrebnychOsetrovatelu'),
            'idTypuVybehu' => request('idTypuVybehu'),
        ]);

        return redirect()->action(
            'VybehController@show', ['id' => $id]
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
        Vybeh::destroy($id);

        return redirect('vybehy');
    }
}
