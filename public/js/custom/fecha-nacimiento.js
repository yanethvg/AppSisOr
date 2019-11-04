//capturando el id del input de fecha
const fecha = document.getElementById('fecha-nacimiento');
//para el id de edad
const edad = document.getElementById('edad');
//sacando la fecha actual
var fechaActual = new Date();
var anio = fechaActual.getFullYear();
let anioNacimiento;
fecha.addEventListener('input',function(){
    let fechaNacimiento = new Date(fecha.value);
    anioNacimiento = fechaNacimiento.getFullYear();
    let edadActual = anio-anioNacimiento;
    //ingresando en el value la edad
    edad.value= `${edadActual} años`
})

