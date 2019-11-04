let cantidad = 0;
//Para agregar Items a los telefono
const telefono= document.getElementById("telefono");
const botonAgregar = document.querySelector(".btn-outline-info");
let botones;
//evento para agregar Elementos
botonAgregar.addEventListener("click", function(e) {
    if (cantidad !== 2) {
        //otra forma 
         /*
        //creando el input
        const inputElement = document.createElement("input");
        inputElement.classList = "form-control mr-2";
        inputElement.type = "text";
        inputElement.name = "telefono";
        //creando los botones
        //boton de agregar
        const simboloAgregar = document.createElement("i");
        simboloAgregar.classList = "fa fa-plus icon-expe";
        const botonAgregar = document.createElement("a");
        botonAgregar.classList = "btn btn-outline-info mr-2 disabled";
        botonAgregar.appendChild(simboloAgregar);
        //boton de eliminar
        const simboloEliminar = document.createElement("i");
        simboloEliminar.classList = "fa fa-trash icon-expe";
        const botonEliminar = document.createElement("a");
        botonEliminar.classList = "btn btn-outline-danger mr-2";
        botonEliminar.appendChild(simboloEliminar);
        //creando el div
        const divElement = document.createElement("div");
        divElement.classList = "col-lg-4 col-md-12 d-flex";

        divElement.appendChild(botonEliminar);
        divElement.insertBefore(botonAgregar, botonEliminar);
        divElement.insertBefore(inputElement, botonAgregar);*/
        div=`
        <div class="col-lg-4 col-md-12 d-flex "> 
            <input class="form-control mr-2" type="text" name="telefono">
            <a class="btn btn-outline-danger mr-2 "><i class="fa fa-trash icon-expe "></i></a>
        </div>
        `;
        const telefono = document.getElementById("telefono");
        telefono.insertAdjacentHTML('beforeend', div);
        cantidad++;
    } 
});

telefono.addEventListener('click',function(e){
    e.preventDefault();
    if(e.target.classList.contains('btn-outline-danger')){
        e.target.parentElement.remove();
        cantidad--;
    }
});


//eventos para eliminar items
//Para eliminar Items a los telefonos
