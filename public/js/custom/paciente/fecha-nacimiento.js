// capturando el id del input de fecha
const fecha = document.getElementById('fecha-nacimiento')
// para el id de edad
const edad = document.getElementById('edad')
// para ingresar valores deacuerdo a la edad
const validacionFecha = document.getElementById('validacionFecha');
//div de templete
let div='';

fecha.addEventListener('input', function () {
  let url = `/pacientes/calcularEdad?fecha_nacimiento=${fecha.value}`
  // FETCH API
  fetch(url)
    .then(res => res.json())
    .then(data => {
      edad.value = `${data} años`;
      if(!document.getElementById("datos_responsable") && data < 18){
          agregarElementosAnios();
      }else if(data >= 18){
        document.getElementById('datos_responsable').remove();
      }
    })
    .catch(error => console.log(error))
})


function agregarElementosAnios () {
  let div = `
    <div id="datos_responsable" class="mt-3 fadein" >
        <div class="form-group ">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <label class="control-label">Nombre de la Madre</label>
                    <input class="form-control" type="text" name="madre" placeholder="Ingrese el nombre de la madre" required>
                </div>
                <div class="col-lg-6 col-md-12">
                    <label class="control-label">Ocupación de la  Madre</label>
                    <input class="form-control" type="text" name="ocupacion_madre" placeholder="Ingrese la ocupacion de la madre" required>
                </div>
            </div>
        </div>
        <div class="form-group">
            <div class="row">
                <div class="col-lg-6 col-md-12">
                    <label class="control-label">Nombre del Padre</label>
                    <input class="form-control" type="text" name="padre" placeholder="Ingrese el nombre de l padre" required>
                </div>
                <div class="col-lg-6 col-md-12">
                    <label class="control-label">Ocupación del Padre</label>
                    <input class="form-control" type="text" name="ocupacion_padre" placeholder="Ingrese la ocupacion del padre" required>
                </div>
            </div>
        </div>
    </div>
    `;
    //insertar despues
    validacionFecha.insertAdjacentHTML('afterend', div);
}
