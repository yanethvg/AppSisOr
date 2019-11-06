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
                if(!this.telefonos[`0`]){
                    this.telefonos[`0`]=true;
                }else if(!this.telefonos[`1`]){
                    this.telefonos[`1`]=true;
                }


        },
        borrarTelefono: function(e){

            if(e.target.id=="telAuxFirst" || e.target.parentElement.id=="telAuxFirst"){
                this.telefonos['0']=false;
                return;
            }
            //this is for the second telephone
            this.telefonos['1']=false;
            return;




        }
    }
});
