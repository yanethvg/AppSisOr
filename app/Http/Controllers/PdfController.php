<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;


class PdfController extends Controller
{
   public function estrategico()
   {
       $pdf = \PDF::loadView('reportes.estrategico');
       return $pdf->download('ejemplo.pdf');
   }
}
