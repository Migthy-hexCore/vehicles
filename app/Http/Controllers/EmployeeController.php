<?php

namespace App\Http\Controllers;

use App\Models\Area;
use App\Models\Dependency;
use App\Models\Employee;
use App\Models\GeneralDirection;
use App\Models\Level;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller;


class EmployeeController extends Controller
{
    public function __construct()
    {
        $this->middleware('can:manage vehicles')->only('edit', 'update', 'destroy', 'create' , 'store');
    }

    public function index()
    {
        return view('employees.index');
    }

    public function create()
    {
        $levels = Level::where('status', 1)->orderBy('id','asc')->get();
        $dependencies = Dependency::where('status', 1)->get();
        $generalDirections = GeneralDirection::where('status', 1)->get();
        $areas = Area::where('status', 1)->get();

        return view('employees.create', compact('levels', 'dependencies', 'generalDirections', 'areas'));
    }

    public function store(Request $request)
    {
        $request->validate(
            [
                'employee_name' => 'required',
                'employee_number' => 'required',
                'level_id' => 'required',
                'position_name' => 'required',
                'dependency_id' => 'required',
                'general_direction_id' => 'required',
            ],
        );

        Employee::create($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Usuario registrado!',
            'text' => 'El Usuario ha sido registrado correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('employees.index');
    }

    public function edit(Employee $employee)
    {
        $$levels = Level::where('status', 1)->orderBy('id','asc')->get();
        $dependencies = Dependency::where('status', 1)->get();
        $generalDirections = GeneralDirection::where('status', 1)->get();
        $areas = Area::where('status', 1)->get();

        return view('employees.edit', compact('employee', 'levels', 'dependencies', 'generalDirections', 'areas'));
    }

    public function update(Request $request, Employee $employee)
    {
        $request->validate(
            [
                'employee_name' => 'required',
                'employee_number' => 'required|exists:employees,employee_number',
                'level_id' => 'required',
                'position_name' => 'required',
                'dependency_id' => 'required',
                'general_direction_id' => 'required',
            ],
            [
                'employee_name.required' => 'Ingresa el nombre del usuario.',
                'employee_number.required' => 'Ingresa el número del usuario.',
                'employee_number.exists' => 'El número de empleado ya existe.',
                'level_id.required' => 'Selecciona el nivel del usuario.',
                'position_name.required' => 'Ingresa el puesto del usuario.',
                'dependency_id.required' => 'Selecciona la dependencia del usuario.',
                'general_direction_id.required' => 'Selecciona la dirección general del usuario.',
                'area_id.required' => 'Selecciona el área del usuario.',
            ]
        );

        $employee->update($request->all());

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Usuario actualizado!',
            'text' => 'El Usuario ha sido actualizado correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('employees.index');
    }

    public function destroy(Employee $employee)
    {
        $employee->delete();

        session()->flash('swal', [
            'icon' => 'success',
            'title' => 'Usuario eliminado!',
            'text' => 'El Usuario ha sido eliminado correctamente.',
            'toast' => true,
            'position' => 'center',
        ]);

        return redirect()->route('employees.index');
    }
}
