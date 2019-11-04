let cantidad = 0;
//Para agregar Items a los telefono
const telefono= document.getElementById("telefono");
const botonAgregar = document.querySelector(".btn-outline-info");

let botones;

//evento para agregar Elementos
botonAgregar.addEventListener("click", function(e) {
    e.preventDefault();
    if (cantidad !== 2) {
        div=`
        <div class="col-lg-4 col-md-12 d-flex "> 
            <input class="form-control mr-2" type="text" name="telefono[]">
            <a class="btn btn-outline-danger mr-2 "><i class="fa fa-trash icon-expe "></i></a>
        </div>
        `;
        telefono.insertAdjacentHTML('beforeend', div);
        cantidad++;
    } 
});

telefono.addEventListener('click',function(e){
    console.log(e.target);
    e.preventDefault();
    if(e.target.classList.contains('btn-outline-danger') ){
        e.target.parentElement.remove();
        cantidad--;
    }else if(e.target.classList.contains('fa-trash')){
        e.target.parentElement.parentElement.remove();
        cantidad--;
    }
});
