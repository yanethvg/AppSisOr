<?php

namespace App\Http\Controllers;


use Illuminate\Http\Request;
//request personalizado
use App\Http\Requests\PacienteRequest;
use App\Http\Requests\PacienteRequestUpdate;
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
        return $edad;
    }
    public function store(PacienteRequest $request)
    {
        $paciente = new Paciente;
        $paciente->nombre = $request->nombre;
        $paciente->fecha_nacimiento = $request->fechaNacimiento;
        $paciente->direccion = $request->direccion;
        $paciente->padecimiento = $request->padecimiento;
        $paciente->direccion_trabajo = $request->trabajo['direccionTrabajo'];
        $paciente->profesion = $request->trabajo['profesion'];
        $paciente->recomendacion = $request->recomendacion;
        $paciente->direccion_trabajo = $request->trabajo["direccionTrabajo"];
        $paciente->profesion = $request->trabajo["profesion"];
        $paciente->save();
        //telefonos
        $paciente->syncTelefonos($request->telefono);
        //estudiantes
        if($request->estudia){
        $paciente->institucion()->save(new Institucion(
            ["carrera" => ($request->estudia["carrera"]??null),
            "grado" => $request->estudia["grado"],
            "nombre" => $request->estudia["nombreInstitucion"]]
        ));
        }
        //encargados
        if($request->encargados){
        $paciente->detallesMenorEdad()->save(new DetalleMenorEdad(
            ["madre" => ($request->encargados["nombreMadre"]??null),
            "padre" => ($request->encargados["nombrePadre"]??null),
            "ocupacion_madre" => ($request->encargados["ocupacionMadre"]??null),
            "ocupacion_padre" => ($request->encargados["ocupacionPadre"]?? null)
            ]
        ));
        }
        //dd($paciente->detallesMenorEdad()->get());
        return response()->json(['respuesta' => 'Paciente registrado con exito ']);
    }
    public function edit($id)
    {
        $paciente = Paciente::findOrFail($id);
        $telefonos = $paciente->telefonos()->get()->all();
        $encargados=$paciente->detallesMenorEdad()->get()->first();
        $estudia = $paciente->institucion()->get()->first();

        $edad = Carbon::parse($paciente->fecha_nacimiento)->age;
        return view('pacientes.edit',compact('paciente','telefonos','encargados','estudia','edad'));
    }
    public function update(PacienteRequestUpdate $request, $id)
    {
        $paciente = Paciente::findOrFail($id);
        $paciente->nombre = $request->nombre;
        $paciente->fecha_nacimiento = $request->fecha_nacimiento;
        $paciente->direccion = $request->direccion;
        $paciente->padecimiento = $request->padecimiento;
        $paciente->direccion_trabajo = $request->direccion_trabajo;
        $paciente->profesion = $request->profesion;
        $paciente->recomendacion = $request->recomendacion;
        $paciente->save();
        //consulta a la base
        $telefonosConsulta = Telefono::where('paciente_id',$id)->delete();
        for($i=0 ; $i<3 ;$i++){
            if(!is_null($request->telefono[$i])){
                $telefono = new Telefono;
                $telefono->telefono = $request->telefono[$i];
                $telefono->paciente_id = $id;
                $telefono->save();
            }
        }
        if($request->grado && $request->nombre_institucion){
            $institucion= Institucion::where('paciente_id',$id)->delete();
            $paciente->institucion()->save(new Institucion(
            ["carrera" => ($request->carrera??null),
            "grado" => $request->grado,
            "nombre" => $request->nombre_institucion]
        ));
        }

        $menores = DetalleMenorEdad::where('paciente_id',$id)->delete();
        $paciente->detallesMenorEdad()->save(new DetalleMenorEdad(
            ["madre" => ($request->madre??null),
            "padre" => ($request->padre??null),
            "ocupacion_madre" => ($request->ocupacion_madre??null),
            "ocupacion_padre" => ($request->ocupacion_padre?? null)
            ]
        ));

        return redirect('/pacientes')->with(['msj' => 'Paciente modificado con exito ']);

    }
    public function show($id)
    {
        $paciente = Paciente::findOrFail($id);
        $telefonos = $paciente->telefonos()->get()->all();
        $encargados=$paciente->detallesMenorEdad()->get()->first();
        $estudia = $paciente->institucion()->get()->first();
        //dd($estudia);
        $edad = Carbon::parse($paciente->fecha_nacimiento)->age;
        return view('pacientes.show',compact('paciente','telefonos','encargados','estudia','edad'));
    }
}
