<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Carbon\Carbon;

use App\Paciente;

class PacienteController extends Controller
{
    public function index()
    {
        $pacientes = Paciente::orderBy('created_at','DESC');
  
        return view('pacientes.index',compact('pacientes'));
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

}
