<?php

namespace App\Http\Controllers;

use App\Models\Division;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class DivisionController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage vehicles')->only('edit', 'update', 'destroy', 'create', 'store');
    }

    public function index()
    {
        return view('divisions.index');
    }

    public function create()
    {
        return view('divisions.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required|numeric|unique:divisions',
            ],
            [
                'name.required' => 'El campo número es requerido.',
                'name.numeric' => 'El campo número debe ser un número.',
                'name.unique' => 'El número ya ha sido registrado.',
            ]
        );

        $request->merge([
            'name' => str_pad($request->input('name'), 2, '0', STR_PAD_LEFT)
        ]);

        Division::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'División registrado!',
            'text' => 'La división ha sido registrado correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('divisions.index');
    }

    public function edit(Division $division)
    {
        return view('divisions.edit', compact('division'));
    }

    public function update(Request $request, Division $division)
    {
        $request->validate(
            [
                'name' => 'required|numeric|unique:divisions,name,' . $division->id,
            ],
            [
                'name.required' => 'El campo número es requerido.',
                'name.numeric' => 'El campo número debe ser un número.',
                'name.unique' => 'El número ya ha sido registrado.',
            ]
        );

        $request->merge([
            'name' => str_pad($request->input('name'), 2, '0', STR_PAD_LEFT)
        ]);

        $division->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'División actualizada!',
            'text' => 'La división ha sido actualizada correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('divisions.index');
    }

    public function destroy(Division $division)
    {
        $division->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'División eliminada!',
            'text' => 'La división ha sido eliminada correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('divisions.index');
    }
}
