<?php

namespace App\Http\Controllers;

use App\DruhZvirete;
use App\Zvire;
use Illuminate\Http\Request;

class DruhZvireteController extends Controller
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
        $druhyZvirat = DruhZvirete::all();

        return view('druhyZvirat.index', compact('druhyZvirat'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('druhyZvirat.create');
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
            'nazev' => 'required|max:20',
        ]);

        $id = DruhZvirete::create([
            'nazev' => request('nazev'),
        ])->id;

        return redirect()->action(
            'DruhZvireteController@index'
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
        $druh = DruhZvirete::find($id);

        $zvirata = Zvire::where('idDruhu', $id)->get();

        return view('druhyZvirat.show', compact('druh','zvirata'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $druhZvirete = DruhZvirete::find($id);

        return view('druhyZvirat.edit', compact('druhZvirete'));
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
            'nazev' => 'required|max:20',
        ]);

        DruhZvirete::where('id', $id)->update([
            'nazev' => request('nazev'),
        ]);

        return redirect()->action(
            'DruhZvireteController@index'
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
        DruhZvirete::destroy($id);

        return redirect('druhyZvirat');
    }
}
