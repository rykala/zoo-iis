<?php

namespace App\Http\Controllers;

use App\Osetrovatel;
use App\TypVybehu;
use App\Vybeh;
use Illuminate\Http\Request;
use App\Cisteni;

class CisteniController extends Controller
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
        $cisteni = Cisteni::all();

        return view('cisteni.index', compact('cisteni'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        $vybehy = Vybeh::all(['id']);
        $osetrovateleNemajiCas = Cisteni::all('idOsetrovatele');
        $vsichniOsetrovatele = Osetrovatel::all(['id', 'jmeno', 'prijmeni']);

        $osetrovatele = [];

        foreach($vsichniOsetrovatele as $osetrovatel) {
            $bylTam = false;
            foreach ($osetrovateleNemajiCas->toArray() as $nemaCas) {
                if($osetrovatel->id === reset($nemaCas)) {
                    $bylTam = true;
                    break;
                }
            }
            if(!$bylTam) {
                $osetrovatele[] = $osetrovatel;
            }
        }

        $casyCisteni = [
            '08:00',
            '08:30',
            '09:00',
            '09:30',
            '10:00',
            '10:30',
            '11:00',
            '11:30',
            '12:00',
            '12:30',
            '13:00',
            '13:30',
            '14:00',
            '14:30',
            '15:00',
            '15:30',
            '16:00',
            '16:30',
            '17:00',
        ];

        return view('cisteni.create', compact('vybehy', 'osetrovatele', 'casyCisteni'));
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
            'idOsetrovatele' => 'required|max:10',
            'idVybehu' => 'required|max:30',
            'casCisteni' => 'required|max:20',
        ]);

        $id = Cisteni::create([
            'idOsetrovatele' => request('idOsetrovatele'),
            'idVybehu' => request('idVybehu'),
            'casCisteni' => request('casCisteni'),
        ])->id;

        return redirect()->action(
            'CisteniController@show', ['id' => $id]
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
        $cisteni = Cisteni::find($id);

        $vybeh = Vybeh::find($cisteni->idVybehu);
        $osetrovatel = Osetrovatel::find($cisteni->idOsetrovatele);



        return view('cisteni.show', compact('vybeh', 'cisteni', 'osetrovatel'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $cisteni = Cisteni::find($id);
        $vybehy = Vybeh::all(['id']);
        $osetrovateleNemajiCas = Cisteni::all('idOsetrovatele');
        $vsichniOsetrovatele = Osetrovatel::all(['id', 'jmeno', 'prijmeni']);

        $osetrovatele = [];

        foreach($vsichniOsetrovatele as $osetrovatel) {
            $bylTam = false;
            foreach ($osetrovateleNemajiCas->toArray() as $nemaCas) {
                if($osetrovatel->id === reset($nemaCas)) {
                    $bylTam = true;
                    break;
                }
            }
            if(!$bylTam || $osetrovatel->id == $cisteni->idOsetrovatele) {
                $osetrovatele[] = $osetrovatel;
            }
        }

        $casyCisteni = [
            '08:00',
            '08:30',
            '09:00',
            '09:30',
            '10:00',
            '10:30',
            '11:00',
            '11:30',
            '12:00',
            '12:30',
            '13:00',
            '13:30',
            '14:00',
            '14:30',
            '15:00',
            '15:30',
            '16:00',
            '16:30',
            '17:00',
        ];

        $vybeh = Vybeh::find($cisteni->idVybehu);
        $osetrovatel = Osetrovatel::find($cisteni->idOsetrovatele);

        return view('cisteni.edit', compact('vybehy', 'osetrovatele', 'casyCisteni', 'cisteni', 'vybeh', 'osetrovatel'));
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
            'idVybehu' => 'required|max:30',
            'casCisteni' => 'required|max:20',
        ]);

        Cisteni::where('id', $id)->update([
            'idOsetrovatele' => request('idOsetrovatele'),
            'idVybehu' => request('idVybehu'),
            'casCisteni' => request('casCisteni'),
        ]);

        return redirect()->action(
            'CisteniController@show', ['id' => $id]
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
        Cisteni::destroy($id);

        return redirect('cisteni');
    }
}
