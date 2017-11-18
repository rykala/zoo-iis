<?php

namespace App\Http\Controllers;

use App\Vybeh;
use Illuminate\Http\Request;

class VybehsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $vybehy = Vybeh::all();

        return view('vybehy.index', compact('vybehy'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('vybehy.create');
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
            'VybehsController@show', ['id' => $id]
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

        return view('vybehy.show', compact('vybeh'));
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

        return view('vybehy.edit', compact('vybeh'));
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
            'VybehsController@show', ['id' => $id]
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
