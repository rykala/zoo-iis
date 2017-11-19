<?php

namespace App\Http\Controllers;

use App\Osetrovatel;
use Illuminate\Http\Request;

class OsetrovatelController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $osetrovatele = Osetrovatel::all();

        return view('osetrovatele.index', compact('osetrovatele'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('osetrovatele.create');
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
            'rodneCislo' => 'required|max:11',
            'jmeno' => 'required|max:20',
            'prijmeni' => 'required|max:20',
            'vzdelani' => 'required|max:20',
            'titul' => 'required|max:10',
        ]);

        $id = Osetrovatel::create([
            'rodneCislo' => request('rodneCislo'),
            'jmeno' => request('jmeno'),
            'prijmeni' => request('prijmeni'),
            'vzdelani' => request('vzdelani'),
            'titul' => request('titul'),
        ])->id;

        return redirect()->action(
            'OsetrovatelController@show', ['id' => $id]
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
        $osetrovatel = Osetrovatel::find($id);

        return view('osetrovatele.show', compact('osetrovatel'));

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $osetrovatel = Osetrovatel::find($id);

        return view('osetrovatele.edit', compact('osetrovatel'));
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
            'rodneCislo' => 'required|max:11',
            'jmeno' => 'required|max:20',
            'prijmeni' => 'required|max:20',
            'vzdelani' => 'required|max:20',
            'titul' => 'required|max:10',
        ]);

        Osetrovatel::where('id', $id)->update([
            'rodneCislo' => request('rodneCislo'),
            'jmeno' => request('jmeno'),
            'prijmeni' => request('prijmeni'),
            'vzdelani' => request('vzdelani'),
            'titul' => request('titul'),
        ]);

        return redirect()->action(
            'OsetrovatelController@show', ['id' => $id]
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
        Osetrovatel::destroy($id);

        return redirect('osetrovatele');
    }
}
