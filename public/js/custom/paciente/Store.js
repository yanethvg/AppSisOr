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
            encargados: null,
            estudia: null,
            trabajo: null,
            antecedente: {
                medico: {
                    saludAnio: false,
                    enfermedadOperacion: false,
                    alergia: false,
                    desmayo: false,
                    sinusitis: false,
                    hepatitis: false,
                    asma: false,
                    artritis: false,
                    diabetes: false,
                    gastritis: false,
                    renal: false,
                    enfermedadVenerea: false,
                    tuberculosis: false,
                    sida: false,
                    presionAlta: false,
                    transtornoSangre: false,
                    tomaMedicamento: false,
                    consumeMedicamento: null,
                },
                odontologico: {
                    chequeoDental: "",
                    accidente: "",
                    habito: "",
                },
                ortodoncico:{
                    primerVisita: false,
                    segundaOpinion: false,
                    tratamientoAnterior: false,
                    problemaFamiliar: false,
                    esperaDeTratamiento: "",
                }
            },
            diagnosticoPrevio: {
                descripcionDiagnostico: '',
                planDeTratamiento: '',
                necesidadOdontologica: '',
            }
        },
        edad:null,
        enableAge: false,
        enableWork: false,
        enableStudy: false,
        errors: {
                nombre: '',
                direccion: '',
                telefono: [],
                padecimiento: '',
                recomendacion: '',
                fechaNacimiento: '',
                encargados: {},
                estudia: {},
                trabajo: {}

        },
        telefonos:{0:false,1:false},
    },
    
   
    methods: {
        createPaciente: function () {
            axios.post('/pacientes', this.paciente)
                .then(response => {
                    this.errors = {};
                    console.log(response.data.respuesta);
                    toastr.success(response.data.respuesta);                    
                    setTimeout(() => {
                        window.location.href='/pacientes';
                    },1000)
                })
                .catch(error => {
                    this.errors = error.response.data.errors;                    
                });
        }
        ,
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
                this.paciente.telefono.splice(1,1);
                return;
            }
            //this is for the second telephone

            this.paciente.telefono.splice(2,1);
            this.telefonos['1']=false;
            return;
        },
        toggleAge: function(e){
            let url = `/pacientes/calcularEdad?fecha_nacimiento=${e.target.value}`
            // FETCH API
            fetch(url)
              .then(res => res.json())
              .then(data => {
                this.edad = `${data} años`;
                if( data < 18){
                    this.enableAge=true;
                    this.paciente.encargados={};                    
                }else if(data >= 18){
                    this.enableAge=false;
                    this.paciente.encargados = null;
                    this.errors.estudia= {};

                }
                console.log(edad.value)
              })
              .catch(error => console.log(error))
        },
        toggleWork: function(){
            this.enableWork=!this.enableWork;
            if(!this.enableWork){
                this.paciente.trabajo = null;
                return;
            }
                this.paciente.trabajo={};
        },
        toggleStudy: function(){
            this.enableStudy=!this.enableStudy;
            if(!this.enableStudy){
                this.paciente.estudia= null;

                return;
            }
            this.paciente.estudia={};
        },                
    }
});
