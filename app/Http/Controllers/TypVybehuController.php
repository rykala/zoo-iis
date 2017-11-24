<?php

namespace App\Http\Controllers;

use App\TypVybehu;
use Illuminate\Http\Request;

class TypVybehuController extends Controller
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
        $typyVybehu = TypVybehu::all();

        return view('typyVybehu.index', compact('typyVybehu'));
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        return view('typyVybehu.create');
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

        $id = TypVybehu::create([
            'nazev' => request('nazev'),
        ])->id;

        return redirect()->action(
            'TypVybehuController@index'
        );
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $typVybehu = TypVybehu::find($id);

        return view('typyVybehu.edit', compact('typVybehu'));
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

        TypVybehu::where('id', $id)->update([
            'nazev' => request('nazev'),
        ]);

        return redirect()->action(
            'TypVybehuController@index'
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
        TypVybehu::destroy($id);

        return redirect('typyVybehu');
    }
}
