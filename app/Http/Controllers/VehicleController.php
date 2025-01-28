<?php

namespace App\Http\Controllers;


use App\Models\Agency;
use App\Models\Brand;
use App\Models\Vehicle;
use App\Models\Division;
use App\Models\Society;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;

class VehicleController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage vehicles')->only('edit', 'update', 'destroy', 'create' , 'store');
    }

    public function index()
    {
        return view('vehicles.index');
    }

    public function create()
    {
        $colors = [
            'Azul' => 'Azul',
            'Blanco' => 'Blanco',
            'Gris' => 'Gris',
            'Plata' => 'Plata',
            'Plata Brillante' => 'Plata Brillante',
            'Plata Met.' => 'Plata Met.',
        ];

        $owners = [
            'GOBIERNO DEL ESTADO DE GUANAJUATO' => 'Gobierno del Estado de Guanajuato',
        ];

        $societies = Society::where('status', 1)->get();
        $divisions = Division::where('status', 1)->get();
        $agencies = Agency::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();

        return view('vehicles.create', compact('agencies', 'brands', 'colors', 'owners', 'societies', 'divisions'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'society_id' => 'required',
                'fixed_asset_number' => 'required',
                'control_number' => 'required',
                'plates' => 'required',
                'division_id' => 'required',
                'serial_number' => 'required',
                'invoice_number' => 'required',
                'engine_number' => 'required',
                'agency_id' => 'required',
                'brand_id' => 'required',
                'type' => 'required',
                'model' => 'required',
                'cylinders' => 'required',
                'doors' => 'required',
                'function' => 'required',
                'passenger_capacity' => 'required',
                'transmission' => 'required',
                'color' => 'required',
                'vehicle_level' => 'required',
                'ownership' => 'required',
                'acquisition_value' => 'required',
            ],
            /* [
                'society_id.required' => 'Selecciona una sociedad',
                'fixed_asset_number.required' => 'Agrega número de activo fijo',
                'control_number.required' => 'Agrega número de control',
                'plates.required' => 'Agrega placas',
                'division_id.required' => 'Selecciona una división',
                'serial_number.required' => 'Selecciona un número de serie',
                'invoice_number.required' => 'Agrega número de factura',
                'agency_id.required' => 'Selecciona una agencia',
                'engine_number.required' => 'Agrega un número de motor',
                'brand_id.required' => 'Selecciona una marca',
                'type.required' => 'Selecciona un tipo',
                'model.required' => 'Selecciona un modelo',
                'cylinders.required' => 'Selecciona un número de cilindros',
                'doors.required' => 'Selecciona un número de puertas',
                'function.required' => 'Agrega una función',
                'passenger_capacity.required' => 'Agrega capacidad de pasajeros',
                'transmission.required' => 'Selecciona una transmisión',
                'color.required' => 'Selecciona un color',
                'vehicle_level.required' => 'Selecciona un nivel de vehículo',
                'ownership.required' => 'Selecciona propietario',
                'acquisition_value.required' => 'Agregar valor de adquisición',
            ] */
        );

        Vehicle::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Vehiculo registrado!',
            'text' => 'El Vehiculo ha sido registrado correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('vehicles.index');
    }

    public function show(Vehicle $vehicle)
    {
        return view('vehicles.show', compact('vehicle'));
    }

    public function edit(Vehicle $vehicle)
    {
        $colors = [
            'Azul' => 'Azul',
            'Blanco' => 'Blanco',
            'Gris' => 'Gris',
            'Plata' => 'Plata',
            'Plata Brillante' => 'Plata Brillante',
            'Plata Met.' => 'Plata Met.',
        ];

        $owners = [
            'GOBIERNO DEL ESTADO DE GUANAJUATO' => 'Gobierno del Estado de Guanajuato',
        ];

        $societies = Society::where('status', '1')->get();
        $divisions = Division::where('status', 1)->get();
        $agencies = Agency::where('status', 1)->get();
        $brands = Brand::where('status', 1)->get();

        return view('vehicles.edit', compact('vehicle', 'societies', 'agencies', 'brands', 'colors', 'owners', 'divisions'));
    }

    public function update(Request $request, Vehicle $vehicle)
    {
        $request->validate(
            [
                'society_id' => 'required',
                'fixed_asset_number' => 'required',
                'control_number' => 'required',
                'plates' => 'required',
                'division_id' => 'required',
                'serial_number' => 'required',
                'invoice_number' => 'required',
                'engine_number' => 'required',
                'agency_id' => 'required',
                'brand_id' => 'required',
                'type' => 'required',
                'model' => 'required',
                'cylinders' => 'required',
                'doors' => 'required',
                'function' => 'required',
                'passenger_capacity' => 'required',
                'transmission' => 'required',
                'color' => 'required',
                'vehicle_level' => 'required',
                'ownership' => 'required',
                'acquisition_value' => 'required',
            ],
            /* [
                'society_id.required' => 'Selecciona una sociedad',
                'fixed_asset_number.required' => 'Agrega número de activo fijo',
                'control_number.required' => 'Agrega número de control',
                'plates.required' => 'Agrega placas',
                'division_id.required' => 'Selecciona una división',
                'serial_number.required' => 'Selecciona un número de serie',
                'invoice_number.required' => 'Agrega número de factura',
                'agency_id.required' => 'Selecciona una agencia',
                'engine_number.required' => 'Agrega un número de motor',
                'brand_id.required' => 'Selecciona una marca',
                'type.required' => 'Selecciona un tipo',
                'model.required' => 'Selecciona un modelo',
                'cylinders.required' => 'Selecciona un número de cilindros',
                'doors.required' => 'Selecciona un número de puertas',
                'function.required' => 'Agrega una función',
                'passenger_capacity.required' => 'Agrega capacidad de pasajeros',
                'transmission.required' => 'Selecciona una transmisión',
                'color.required' => 'Selecciona un color',
                'vehicle_level.required' => 'Selecciona un nivel de vehículo',
                'ownership.required' => 'Selecciona propietario',
                'acquisition_value.required' => 'Agregar valor de adquisición',
            ] */
        );

        $vehicle->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Vehiculo actualizado!',
            'text' => 'El Vehiculo ha sido actualizado correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('vehicles.index');
    }

    public function destroy(Vehicle $vehicle)
    {
        $vehicle->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Vehiculo eliminado!',
            'text' => 'El Vehiculo ha sido eliminado correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('vehicles.index');
    }
}
