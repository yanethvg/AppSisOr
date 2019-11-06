const checkBoxTrabaja = document.querySelector('#trabaja');

let elementosLaborales = document.getElementById('infoTrabajo');



checkBoxTrabaja.addEventListener('click',function(){
    if(document.querySelector('#trabaja').checked){
        crearElementosLaborales();
    }else{
        eliminarElementosLaborales();
    }
})

function crearElementosLaborales(){
    let divLaboral =`
    <div id="datos_trabajo" class="fadein">
        <div class="form-group">
            <label class="control-label">Dirección de Trabajo</label>
            <input class="form-control" type="text" name="direccion_trabajo" placeholder="Ingrese la Dirección de Trabajo" required>
        </div>
        <div class="form-group">
            <label class="control-label">Profesión</label>
            <input class="form-control" type="text" name="profesion" placeholder="Ingrese la Profesión" required>
        </div>
    </div>`;
    elementosLaborales.insertAdjacentHTML('beforeend', divLaboral);
}

function eliminarElementosLaborales(){
    let datos = document.getElementById("datos_trabajo");
    elementosLaborales.removeChild(datos);
}