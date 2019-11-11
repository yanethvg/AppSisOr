<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//request personalizado
use App\Http\Requests\PacienteRequest;
use App\Institucion;
use App\DetalleMenorEdad;
use App\Paciente;
use App\Telefono;
use Carbon\Carbon;


class PacienteController extends Controller
{
    public function list(Request $request){
        $pacientes=Paciente::orderby('id','DESC')
                ->paginate(5);

        return [
            'pagination' => [
                'total'         => $pacientes->total(),
                'current_page'  => $pacientes->currentPage(),
                'per_page'      => $pacientes->perPage(),
                'last_page'     => $pacientes->lastPage(),
                'from'          => $pacientes->firstItem(),
                'to'            => $pacientes->lastItem(),
            ],
            'pacientes' => $pacientes,
        ];
    }
    public function index()
    {
        return view('pacientes.index');
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
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.edit',compact('paciente'));
    }
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        return view('pacientes.show',compact('paciente'));
    }
}
