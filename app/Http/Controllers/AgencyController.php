<?php

namespace App\Http\Controllers;

use App\Models\Agency;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class AgencyController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage vehicles')->only('edit', 'update', 'destroy', 'create', 'store');
    }

    public function index()
    {
        return view('agencies.index');
    }

    public function create()
    {
        return view('agencies.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Agency::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Agencia registrada!',
            'text' => 'La agencia ha sido registrada correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('agencies.index');
    }

    public function edit(Agency $agency)
    {
        return view('agencies.edit', compact('agency'));
    }

    public function update(Request $request, Agency $agency)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $agency->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Agencia actualizada!',
            'text' => 'La agencia ha sido actualizada correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('agencies.index');
    }

    public function destroy(Agency $agency)
    {
        $agency->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Agencia eliminada!',
            'text' => 'La agencia ha sido eliminada correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('agencies.index');
    }
}
