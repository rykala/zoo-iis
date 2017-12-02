<?php

namespace App\Http\Controllers;

use App\Osetrovatel;
use App\OsetrovatelMaSkoleni;
use App\Skoleni;
use App\User;
use Illuminate\Http\Request;

class OsetrovatelController extends Controller
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
            'email' => 'required|string|email|max:255|unique:users',
            'password' => 'required|string|min:6|confirmed',
            'rodneCislo' => 'required|max:11|digits:10',
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

        $user = User::create([
            'email' => request('email'),
            'password' => bcrypt(request('password')),
            'idOsetrovatele' => $id,
        ]);

        $user->attachRole(3); // TODO @iis role osetrovatele

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
        $user = User::where('idOsetrovatele', $id)->get()[0];
        $osetrovatelMaSkoleni = OsetrovatelMaSkoleni::where('idOsetrovatele', $id)->get();
        $skoleni = Skoleni::all();

        $showMakeHlOButton = false;
        if ($user->level() < 2) {
            $showMakeHlOButton = true;
        }

        return view('osetrovatele.show', compact('osetrovatel', 'showMakeHlOButton', 'osetrovatelMaSkoleni', 'skoleni'));

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
            'rodneCislo' => 'required|max:11|digits:10',
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
        $user = User::where('idOsetrovatele', $id)->get()[0];
        User::destroy($user->id);
        Osetrovatel::destroy($id);

        return redirect('osetrovatele');
    }
}
