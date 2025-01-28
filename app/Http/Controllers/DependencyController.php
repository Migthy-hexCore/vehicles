<?php

namespace App\Http\Controllers;

use App\Models\Dependency;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class DependencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage vehicles')->only('edit', 'update', 'destroy', 'create', 'store');
    }

    public function index()
    {
        return view('dependencies.index');
    }

    public function create()
    {
        return view('dependencies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Dependency::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Dependencia registrado!',
            'text' => 'La dependencia ha sido registrado correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('dependencies.index');
    }

    public function edit(Dependency $dependency)
    {
        return view('dependencies.edit', compact('dependency'));
    }

    public function update(Request $request, Dependency $dependency)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $dependency->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Dependencia actualizado!',
            'text' => 'La dependencia ha sido actualizado correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('dependencies.index');
    }

    public function destroy(Dependency $dependency)
    {
        $dependency->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Dependencia eliminado!',
            'text' => 'La dependencia ha sido eliminado correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('dependencies.index');
    }
}
