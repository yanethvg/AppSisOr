const checkBox = document.querySelector('#estudia').nextElementSibling;

let elementosEstudiantiles = document.getElementById('infoEstudiantil');


checkBox.addEventListener('click',function(){
    if(!document.querySelector('#estudia').checked){
        crearElementos();
    }else{
        eliminarElementos();
    }
})

function crearElementos(){
    let div=`
        <div id="datos_estudiantiles" class="fadein">
        <div class="form-group">
            <label class="control-label">Nombre de Institución</label>
            <input class="form-control" type="text" name="nombre-institucion" placeholder="Ingrese Nombre de Institución">
        </div>
        <div class="form-group">
            <label class="control-label">Grado</label>
            <input class="form-control" type="text" name="grado" placeholder="Ingrese el Grado Academico">
        </div>
        <div class="form-group">
            <label class="control-label">Carrera</label>
            <input class="form-control" type="text" name="carrera" placeholder="Ingrese la carrera">
        </div>
        </div>
    `;
    elementosEstudiantiles.insertAdjacentHTML('beforeend', div);
}
function eliminarElementos(){
    let datos = document.getElementById("datos_estudiantiles");
    elementosEstudiantiles.removeChild(datos);
}