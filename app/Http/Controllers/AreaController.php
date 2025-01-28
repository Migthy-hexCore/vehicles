<?php

namespace App\Http\Controllers;

use App\Models\Area;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class AreaController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage vehicles')->only('edit', 'update', 'destroy', 'create', 'store');
    }

    public function index()
    {
        return view('areas.index');
    }

    public function create()
    {
        return view('areas.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Area::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'área registrada!',
            'text' => 'La área ha sido registrada correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('areas.index');
    }

    public function edit(Area $area)
    {
        return view('areas.edit', compact('area'));
    }

    public function update(Request $request, Area $area)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $area->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'área actualizada!',
            'text' => 'La área ha sido actualizada correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('areas.index');
    }

    public function destroy(Area $area)
    {
        $area->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Área eliminada!',
            'text' => 'La área ha sido eliminada correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('areas.index');
    }
}
