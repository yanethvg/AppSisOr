const app = new Vue({
    el: "#store",

    data: {
        paciente: {
            nombre: "",
            direccion: "",
            telefono: [],
            padecimiento: "",
            recomendacion: "",
            fechaNacimiento: "",
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
                    consumeMedicamento: null
                },
                odontologico: {
                    chequeoDental: "",
                    accidente: "",
                    habito: ""
                },
                ortodoncico: {
                    primerVisita: false,
                    segundaOpinion: false,
                    tratamientoAnterior: false,
                    problemaFamiliar: false,
                    esperaDeTratamiento: ""
                }
            },
            diagnosticoPrevio: {
                descripcionDiagnostico: "",
                planDeTratamiento: "",
                necesidadOdontologica: ""
            },
            dientesMaxilarDerecho: [
                { nombre: "1-1", valor: 0 },
                { nombre: "1-2", valor: 0 },
                { nombre: "1-3", valor: 0 },
                { nombre: "1-4", valor: 0 },
                { nombre: "1-5", valor: 0 },
                { nombre: "1-6", valor: 0 },
                { nombre: "1-7", valor: 0 },
                { nombre: "1-8", valor: 0 }
            ],
            dientesMaxilarIzquierdo: [
                { nombre: "2-1", valor: 0 },
                { nombre: "2-2", valor: 0 },
                { nombre: "2-3", valor: 0 },
                { nombre: "2-4", valor: 0 },
                { nombre: "2-5", valor: 0 },
                { nombre: "2-6", valor: 0 },
                { nombre: "2-7", valor: 0 },
                { nombre: "2-8", valor: 0 }
            ],
            dientesMandibulaDerecho: [
                { nombre: "3-1", valor: 0 },
                { nombre: "3-2", valor: 0 },
                { nombre: "3-3", valor: 0 },
                { nombre: "3-4", valor: 0 },
                { nombre: "3-5", valor: 0 },
                { nombre: "3-6", valor: 0 },
                { nombre: "3-7", valor: 0 },
                { nombre: "3-8", valor: 0 }
            ],
            dientesMandibulaIzquierdo: [
                { nombre: "4-1", valor: 0 },
                { nombre: "4-2", valor: 0 },
                { nombre: "4-3", valor: 0 },
                { nombre: "4-4", valor: 0 },
                { nombre: "4-5", valor: 0 },
                { nombre: "4-6", valor: 0 },
                { nombre: "4-7", valor: 0 },
                { nombre: "4-8", valor: 0 }
            ],
            sumMaxilarDerecho: 0,
            sumMaxilarIzquierdo: 0,
            sumMandibulaDerecho: 0,
            sumMandibulaIzquierdo: 0,
            totalMaxilar: 0,
            totalMandibula: 0,
            arcoMaxilar: 0,
            arcoMandibular: 0,
            excesoMaxilar: 0,
            excesoMandibular: 0,
            boltonAnterior: 0,
            boltonTotal: 0
        },
        edad: null,
        enableAge: false,
        enableWork: false,
        enableStudy: false,
        errors: {
            nombre: "",
            direccion: "",
            telefono: [],
            padecimiento: "",
            recomendacion: "",
            fechaNacimiento: "",
            encargados: {},
            estudia: {},
            trabajo: {}
        },
        telefonos: { 0: false, 1: false },
        lineaMx: true,
        lineaMd: true
    },

    methods: {
        createPaciente: function() {
            axios
                .post("/pacientes", this.paciente)
                .then(response => {
                    this.errors = {};
                    console.log(response.data.respuesta);
                    toastr.success(response.data.respuesta);
                    setTimeout(() => {
                        window.location.href = "/pacientes";
                    }, 1000);
                })
                .catch(error => {
                    this.errors = error.response.data.errors;
                });
        },
        agregarTelefono: function() {
            //Para agregar Items a los telefono
            if (!this.telefonos[`0`]) {
                this.telefonos[`0`] = true;
            } else if (!this.telefonos[`1`]) {
                this.telefonos[`1`] = true;
            }
        },
        borrarTelefono: function(e) {
            if (
                e.target.id == "telAuxFirst" ||
                e.target.parentElement.id == "telAuxFirst"
            ) {
                this.telefonos["0"] = false;
                this.paciente.telefono.splice(1, 1);
                return;
            }
            //this is for the second telephone

            this.paciente.telefono.splice(2, 1);
            this.telefonos["1"] = false;
            return;
        },
        toggleAge: function(e) {
            let url = `/pacientes/calcularEdad?fecha_nacimiento=${e.target.value}`;
            // FETCH API
            fetch(url)
                .then(res => res.json())
                .then(data => {
                    this.edad = `${data} años`;
                    if (data < 18) {
                        this.enableAge = true;
                        this.paciente.encargados = {};
                    } else if (data >= 18) {
                        this.enableAge = false;
                        this.paciente.encargados = null;
                        this.errors.estudia = {};
                    }
                    console.log(edad.value);
                })
                .catch(error => console.log(error));
        },
        toggleWork: function() {
            this.enableWork = !this.enableWork;
            if (!this.enableWork) {
                this.paciente.trabajo = null;
                return;
            }
            this.paciente.trabajo = {};
        },
        toggleStudy: function() {
            this.enableStudy = !this.enableStudy;
            if (!this.enableStudy) {
                this.paciente.estudia = null;
                return;
            }
            this.paciente.estudia = {};
        }
    },
    computed: {
        totalSumMaxilarDerecho() {
            this.paciente.sumMaxilarDerecho = 0;
            this.paciente.dientesMaxilarDerecho.forEach(diente => {
                if (diente.valor != 0) {
                    this.paciente.sumMaxilarDerecho =
                        this.paciente.sumMaxilarDerecho + diente.valor;
                }
            });
            return this.paciente.sumMaxilarDerecho;
        },
        totalSumMaxilarIzquierdo() {
            this.paciente.sumMaxilarIzquierdo = 0;
            this.paciente.dientesMaxilarIzquierdo.forEach(diente => {
                if (diente.valor != 0) {
                    this.paciente.sumMaxilarIzquierdo =
                        this.paciente.sumMaxilarIzquierdo + diente.valor;
                }
            });
            return this.paciente.sumMaxilarIzquierdo;
        },
        totalSumMandibulaDerecho() {
            this.paciente.sumMandibulaDerecho = 0;
            this.paciente.dientesMandibulaDerecho.forEach(diente => {
                if (diente.valor != 0) {
                    this.paciente.sumMandibulaDerecho =
                        this.paciente.sumMandibulaDerecho + diente.valor;
                }
            });
            return this.paciente.sumMandibulaDerecho;
        },
        totalSumMandibulaIzquierdo() {
            this.paciente.sumMandibulaIzquierdo = 0;
            this.paciente.dientesMandibulaIzquierdo.forEach(diente => {
                if (diente.valor != 0) {
                    this.paciente.sumMandibulaIzquierdo =
                        this.paciente.sumMandibulaIzquierdo + diente.valor;
                }
            });
            return this.paciente.sumMandibulaIzquierdo;
        },
        maxilar() {
            this.paciente.totalMaxilar = 0;
            return (this.paciente.totalMaxilar =
                this.paciente.sumMaxilarDerecho +
                this.paciente.sumMaxilarIzquierdo);
        },
        mandibula() {
            this.paciente.totalMandibula = 0;
            return (this.paciente.totalMandibula =
                this.paciente.sumMandibulaDerecho +
                this.paciente.sumMandibulaIzquierdo);
        },
        totalArcoMaxilar() {
            return (this.paciente.excesoMaxilar =
                this.paciente.arcoMaxilar - this.paciente.totalMaxilar);
        },
        totalArcoMandibular() {
            return (this.paciente.excesoMandibular =
                this.paciente.arcoMandibular - this.paciente.totalMandibula);
        },
        resultadoBoltonAnterior() {
            this.boltonAnterior = 0;
            let dientesPacienteMaxilarDerecho = this.paciente
                .dientesMaxilarDerecho;
            let dientesPacienteMaxilarIzquierdo = this.paciente
                .dientesMaxilarIzquierdo;
            let dientesPacienteMandibulaDerecha = this.paciente
                .dientesMandibulaDerecho;
            let dientesPacienteMandibulaIzquierda = this.paciente
                .dientesMandibulaIzquierdo;
            let sumMaxilar = 0;
            let sumMandibula = 0;
            for (let i = 0; i < 3; i++) {
                if (dientesPacienteMaxilarDerecho[i].valor != 0) {
                    sumMaxilar += dientesPacienteMaxilarDerecho[i].valor;
                }
                if (dientesPacienteMaxilarIzquierdo[i].valor != 0) {
                    sumMaxilar += dientesPacienteMaxilarIzquierdo[i].valor;
                }
                if (dientesPacienteMandibulaDerecha[i].valor != 0) {
                    sumMandibula += dientesPacienteMandibulaDerecha[i].valor;
                }
                if (dientesPacienteMandibulaIzquierda[i].valor != 0) {
                    sumMandibula += dientesPacienteMandibulaIzquierda[i].valor;
                }
            }
            if (sumMaxilar != 0) {
                this.boltonAnterior = (sumMandibula / sumMaxilar) * 100;
            }
            return this.boltonAnterior.toFixed(1);
        },
        resultadoBoltonTotal(){
            this.boltonTotal = 0;
            let dientesPacienteMaxilarDerecho = this.paciente
                .dientesMaxilarDerecho;
            let dientesPacienteMaxilarIzquierdo = this.paciente
                .dientesMaxilarIzquierdo;
            let dientesPacienteMandibulaDerecha = this.paciente
                .dientesMandibulaDerecho;
            let dientesPacienteMandibulaIzquierda = this.paciente
                .dientesMandibulaIzquierdo;
            let sumMaxilar = 0;
            let sumMandibula = 0;
            for (let i = 0; i < 6; i++) {
                if (dientesPacienteMaxilarDerecho[i].valor != 0) {
                    sumMaxilar += dientesPacienteMaxilarDerecho[i].valor;
                }
                if (dientesPacienteMaxilarIzquierdo[i].valor != 0) {
                    sumMaxilar += dientesPacienteMaxilarIzquierdo[i].valor;
                }
                if (dientesPacienteMandibulaDerecha[i].valor != 0) {
                    sumMandibula += dientesPacienteMandibulaDerecha[i].valor;
                }
                if (dientesPacienteMandibulaIzquierda[i].valor != 0) {
                    sumMandibula += dientesPacienteMandibulaIzquierda[i].valor;
                }
            }
            if (sumMaxilar != 0) {
                this.boltonTotal = (sumMandibula / sumMaxilar) * 100;
            }
            return this.boltonTotal.toFixed(1);
        }
    }
});
