<?php

namespace App\Http\Controllers;

use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class SocietyController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage vehicles')->only('edit', 'update', 'destroy', 'create' , 'store');
    }

    public function index()
    {
        return view('societies.index');
    }

    public function create()
    {
        return view('societies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $request->merge([
            'name' => strtoupper($request->input('name'))
        ]);

        Society::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Sociedad registrado!',
            'text' => 'La sociedad ha sido registrado correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('societies.index');
    }

    public function edit(Society $society)
    {
        return view('societies.edit', compact('society'));
    }

    public function update(Request $request, Society $society)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $request->merge([
            'name' => strtoupper($request->input('name'))
        ]);

        $society->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Sociedad actualizado!',
            'text' => 'La sociedad ha sido actualizado correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('societies.index');
    }

    public function destroy(Society $society)
    {
        $society->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Sociedad eliminado!',
            'text' => 'La sociedad ha sido eliminado correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('societies.index');
    }
}
