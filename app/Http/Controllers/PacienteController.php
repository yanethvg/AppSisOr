<?php

namespace App\Http\Controllers;

use App\DetalleMenorEdad;
use Illuminate\Http\Request;
//request personalizado
use App\Http\Requests\PacienteRequest;
use App\Institucion;
use Carbon\Carbon;

use App\Paciente;
use App\Telefono;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::orderBy('created_at', 'DESC');

        return view('pacientes.index', compact('pacientes'));
    }
    public function create()
    {
        return view('pacientes.create');
    }
    //Para calcular la Edad
    public function calcularEdad(Request $request)
    {
        $edad = Carbon::parse($request->fecha_nacimiento)->age;
        // dd($edad);
        return $edad;
    }
    public function store(Request $request)
    {
        $paciente = new Paciente;
        $paciente->nombre = $request->nombre;
        $paciente->fecha_nacimiento = $request->direccion;
        $paciente->padecimiento = $request->padecimiento;
        $paciente->direccion_trabajo = $request->trabajo['direccionTrabajo'];
        $paciente->profesion = $request->trabajo['profesion'];
        $paciente->recomendacion = $request->recomendacion;
        $paciente->direccion = $request->direccion;
        //$paciente->save();
        dd($request->trabajo->direccionTrabajo);

        return response()->json(['respuesta' => 'Paciente registrado con exito ']);
    }
    public function edit($id)
    {
        return view('pacientes.edit');
    }
}
