<?php

namespace App\Http\Controllers;

use App\Osetrovatel;
use App\OsetrovatelMaSkoleni;
use App\Skoleni;
use App\User;
use Bican\Roles\Models\Permission;
use Bican\Roles\Models\Role;
use Illuminate\Http\Request;

class RoleController extends Controller
{
    private $adminRole;
    private $hlavniOsetrovatelRole;
    private $osetrovatelRole;

    public function getRoleAdmin()
    {
        $this->adminRole = Role::create([
            'name' => 'Admin',
            'slug' => 'admin',
            'description' => 'Vedoucí zoo',
            'level' => 3,
        ]);
    }

    public function getRoleHlavniOsetrovatel()
    {
        $this->hlavniOsetrovatelRole = Role::create([
            'name' => 'HlavniOsetrovatel',
            'slug' => 'hlavniosetrovatel',
            'description' => 'Hlavní ošetřovatel',
            'level' => 2,
        ]);
    }

    public function getRoleOsetrovatel()
    {
        $this->osetrovatelRole = Role::create([
            'name' => 'Osetrovatel',
            'slug' => 'osetrovatel',
            'description' => 'Ošetřovatel',
            'level' => 1,
        ]);
    }

    public function setAdmin($id)
    {
        $user = User::find($id);

        $user->attachRole(1); // TODO @iis role admina
    }

    public function setHlavniOsetrovatel($id)
    {
        $user = User::where('idOsetrovatele', $id)->get()[0];
        $user->attachRole(2); // TODO @iis role hl. ošetřovatele

        $osetrovatel = Osetrovatel::find($id);
        $osetrovatelMaSkoleni = OsetrovatelMaSkoleni::where('idOsetrovatele', $id)->get();
        $skoleni = Skoleni::all();

        $showMakeHlOButton = false;
        return view('osetrovatele.show', compact('osetrovatel', 'showMakeHlOButton', 'osetrovatelMaSkoleni', 'skoleni'));
    }

    public function unsetHlavniOsetrovatel($id)
    {
        $user = User::where('idOsetrovatele', $id)->get()[0];
        $user->attachRole(3); // TODO @iis role hl. ošetřovatele

        $osetrovatel = Osetrovatel::find($id);
        $osetrovatelMaSkoleni = OsetrovatelMaSkoleni::where('idOsetrovatele', $id)->get();
        $skoleni = Skoleni::all();

        $showMakeHlOButton = true;
        return view('osetrovatele.show', compact('osetrovatel', 'showMakeHlOButton', 'osetrovatelMaSkoleni', 'skoleni'));
    }
}
