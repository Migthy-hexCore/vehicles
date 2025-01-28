<?php

namespace App\Http\Controllers;

use App\Models\Brand;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class BrandController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage vehicles')->only('edit', 'update', 'destroy', 'create' , 'store');
    }

    public function index()
    {
        return view('brands.index');
    }

    public function create()
    {
        return view('brands.create');
    }

    public function store(Request $request)
    {
        $request->validate([
            'name' => 'required',
        ]);

        Brand::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Marca registrada!',
            'text' => 'La marca ha sido registrada correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('brands.index');
    }

    public function edit(Brand $brand)
    {
        return view('brands.edit', compact('brand'));
    }

    public function update(Request $request, Brand $brand)
    {
        $request->validate([
            'name' => 'required',
        ]);

        $brand->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Marca actualizada!',
            'text' => 'La marca ha sido actualizada correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('brands.index');
    }

    public function destroy(Brand $brand)
    {
        $brand->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Marca eliminada!',
            'text' => 'La marca ha sido eliminada correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('brands.index');
    }
}
