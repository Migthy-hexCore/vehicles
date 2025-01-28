<?php

namespace App\Http\Controllers;

use App\Models\GeneralDirection;
use Illuminate\Http\Request;

class DirectionController extends Controller
{
    public function index()
    {
        return view('directions.index');
    }

    public function create()
    {
        return view('directions.create');
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'name' => 'required',
                'program_code' => 'required | unique:general_directions',
            ],
            [
                'program_code.unique' => 'El código programático ya está en uso.'
            ],
        );

        GeneralDirection::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Dirección general registrada!',
            'text' => 'La dirección general ha sido registrada correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('directions.index');
    }

    public function edit(GeneralDirection $direction)
    {
        return view('directions.edit', compact('direction'));
    }

    public function update(Request $request, GeneralDirection $direction)
    {
        $request->validate(
            [
                'name' => 'required',
                'program_code' => 'required | exists:general_directions,program_code',
            ],
            [
                'program_code.exists' => 'El código programático ya está en uso.'
            ],
        );

        $direction->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Dirección general actualizada!',
            'text' => 'La dirección general ha sido actualizada correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('directions.index');
    }

    public function destroy(GeneralDirection $direction)
    {
        $direction->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Dirección general eliminada!',
            'text' => 'La dirección general ha sido eliminada correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('directions.index');
    }
}
