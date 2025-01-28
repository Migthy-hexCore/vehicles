<?php

namespace App\Http\Controllers;

use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class LevelController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage vehicles')->only('edit', 'update', 'destroy', 'create', 'store');
    }

    public function index()
    {
        return view('levels.index');
    }

    public function create()
    {
        return view('levels.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'level' => 'required',
        ]);

        Level::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Nivel registrado!',
            'text' => 'El nivel ha sido registrado correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('levels.index');
    }

    public function edit(Level $level)
    {
        return view('levels.edit', compact('level'));
    }

    public function update(Request $request, Level $level)
    {
        $request->validate([
            'level' => 'required',
        ]);

        $level->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Nivel actualizado!',
            'text' => 'El nivel ha sido actualizado correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('levels.index');
    }

    public function destroy(Level $level)
    {
        $level->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Nivel eliminado!',
            'text' => 'El nivel ha sido eliminado correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('levels.index');
    }
}
