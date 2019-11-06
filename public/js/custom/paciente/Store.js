new Vue({
    el: '#store',
    data: {
        paciente: {
            nombre: '',
            direccion: '',
            telefono: [],
            padecimiento: '',
            recomendacion: '',
            fechaNacimiento: '',
            encargados: {
                nombreMadre: '',
                ocupacionMadre: '',
                nombrePadre: '',
                ocupacionPadre: '',
            },
            estudia: {
                nombreInstitucion: '',
                grado: '',
                carrera: '',
            },
            trabajo: {
                direccionTrabajo: '',
                profesion: '',
            }

        },
        cantidad : 0
        ,
        errors: {},
        telefonos:{0:false,1:false}
    },
    methods: {
        createPaciente: function () {
            axios.post('/pacientes', this.paciente)
                .then(response => {
                    this.errors = {};
                    toastr.success(response.data.respuesta);
                })
                .catch(error => {
                    errors = error.response.data.errors;
                    console.log(errors);
                });
        },
        agregarTelefono: function(){
            //Para agregar Items a los telefono
            if (this.cantidad < 2) {
                this.telefonos[`${this.cantidad}`]=true;
            }
            this.cantidad++;

        },
        borrarTelefono: function(e){
            console.log(e);
            this.cantidad--;
            if(e.target.classList.contains('btn-outline-danger') ){
                e.target.parentElement.remove();
            }else if(e.target.classList.contains('fa-trash')){
                e.target.parentElement.parentElement.remove();
            }

        }
    }
});
