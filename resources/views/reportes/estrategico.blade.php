<!DOCTYPE html>
<html lang="es">
    <head>        
        <title>Estrategico</title>  
        <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.3.1/css/bootstrap.min.css" integrity="sha384-ggOyR0iXCbMQv3Xipma34MD+dH/1fQ784/j6cY/iJTQUOhcWr7x9JvoRxT2MZw1T" crossorigin="anonymous">  
    </head>
    <body>        
        <div class="container">                            
            <div class="row mt-2">               
                <div class="col-9">
                    <img src="{{ asset('img/logo.jpg')}}" class="rounded float-left" alt="logo" width="80px" height="80px">
                    <h4 class="text-center">Ortodoncia S.A</h4>
                    <h5 class="text-center">Pacientes con Mora</h5>
                    <h6 class="text-center">Fecha: 13/11/2019</h6>
                </div>
            </div>           
            <div class="row mt-5">
                <div class="col">
                    <table class="table table-striped">
                        <thead class="thead-dark">
                            <tr>
                                <th class="text-center">#</th>                    
                                <th class="text-center">Paciente</th>
                                <th class="text-center">Ultima fecha de pago</th>
                                <th class="text-center">Cuotas Retrasadas</th>
                                <th class="text-center">Saldo</th>
                            </tr>
                        </thead>
                        <tbody>
                            <tr>
                                <td class="text-center">1</td>
                                <td class="text-center">Martinez, José</td>
                                <td class="text-center">01/01/2019</td>
                                <td class="text-center">10</td>
                                <td class="text-center">500</td>
                            </tr>
                            <tr>                        
                                <td colspan="4" class="text-center">Total</td>
                                <td>500</td>
                            </tr>
                        </tbody>
                    </table>    
                </div>
            </div>
        </div>
    </body>
</html>