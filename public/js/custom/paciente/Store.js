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
            fichaDeOrtodoncia: {
                facialFrontal: {
                    frontal: "",
                    tercios: "",
                    simetria: true,
                    sonrisa: "",
                    competencia: true,
                },
                perfil: {
                    perfilSuperior: "",
                    perfilInferior: "",
                    anguloNasolabial: "",
                    nariz: "",
                    labios: ""
                },
                tejidosIntraorales: {
                    inspeccion: "",
                    palpacion: "",
                    encias: "",
                    frenillos: ""
                },
                denticion: {
                    denticion: "",
                    faltantes: ""
                },
                lineasMedias: {
                    maxilar:"",
                    mxDesviado: "",
                    mxCantidad: 0.0,
                    mandibula: "",
                    mdDesviado: "",
                    mdCantidad: 0.0
                },
                mordidas: {
                    horizontal: 0.0,
                    vertical: "",
                    mordidasCruzadas: ""
                },
                relacionesSagitales: {
                    molarDerecha: "",
                    molarIzquierda: "",
                    caninaDerecha: "",
                    caninaIzquierda: ""
                },

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
            cefalometrico: [
                { nombre: "Convexidad", valor: 2, valorRegular: 2, descripcion:"1", menor:"Protrusión Mx. Clase III", normal:"Normal", mayor:"Protrusión Mx. Clase II" },
                { nombre: "SNA", valor: 82, valorRegular: 82, descripcion:"1", menor:"Retrognatismo Mx", normal:"Normal", mayor:"Prognatismo Mx" },
                { nombre: "SNB", valor: 80, valorRegular: 80, descripcion:"1", menor:"Retrognatismo Md", normal:"Normal", mayor:"Prognatismo Md" },
                { nombre: "ANB", valor: 2, valorRegular: 2, descripcion:"1", menor:"Clase III Esqueletal", normal:"Clase I Esqueletal", mayor:"Clase II Esqueletal" },
                { nombre: "Profundidad maxilar", valor: 90, valorRegular: 90, descripcion:"1", menor:"Retrusión Maxila", normal:"Normal", mayor:"Protrusión Maxilar" },
                { nombre: "Profundidad facial", valor: 90, valorRegular: 90, descripcion:"1", menor:"Retrognatismo Md", normal:"Normal", mayor:"Prognatismo Md" },
                { nombre: "Longitud del cuerpo Md", valor: 65, valorRegular: 65, descripcion:"1", menor:"Retrusión Md", normal:"Normal", mayor:"Protusión Md" },
                { nombre: "Altura facial inferior", valor: 47, valorRegular: 47, descripcion:"1", menor:"Mordida Profunda", normal:"Normal", mayor:"Mordida Abierta" },
                /*{ nombre: "Altura maxilar", valor: 53, valorRegular: 53, descripcion:"1", menor:"", normal:"", mayor:"" },
                { nombre: "Altura facial posterior", valorRegular: 55, valor: 55, descripcion:"1", menor:"", normal:"", mayor:"" },
                { nombre: "Plano palatal", valor: 1, valorRegular: 1, descripcion:"1", menor:"", normal:"", mayor:"" },
                { nombre: "Longitud de labio superior", valorRegular: 24, valor: 24, descripcion:"1", menor:"", normal:"", mayor:"" },
                { nombre: "Protusión labial", valor: -2, valorRegular: -2, descripcion:"1", menor:"", normal:"", mayor:"" },*/
                { nombre: "Eje facial", valor: 90, valorRegular: 90, descripcion:"1", menor:"Dolicofacial Crecimiento Vertical", normal:"Normal Mesofacial Crecimiento Neutro", mayor:"Braquifacial Crecimiento Horizontal" },
                { nombre: "Cono facial", valor: 68, valorRegular: 68, descripcion:"1", menor:"Patrón Vertical Dolicofacial", normal:"Normal Mesofacial", mayor:"Patrón Horizontal Braquifacial" },
                /*{ nombre: "Plano mandibular", valor: 26, valorRegular: 26, descripcion:"1", menor:"", normal:"", mayor:"" },
                { nombre: "Protrusión incisivo Mx", valor: 3.5, valorRegular: 3.5, descripcion:"1", menor:"", normal:"", mayor:"" },
                { nombre: "Protrusión incisivo Md", valor: 1, valorRegular: 1, descripcion:"1", menor:"", normal:"", mayor:"" },
                { nombre: "Inc. Mx-Franckfurt", valor: 110, valorRegular: 110, descripcion:"1", menor:"", normal:"", mayor:"" },
                { nombre: "Inc. Md.-P. mandibular", valor: 90, valorRegular: 90, descripcion:"1", menor:"", normal:"", mayor:"" },
                { nombre: "Wits", valor: 0, valorRegular: 0, descripcion:"1", menor:"", normal:"", mayor:"" },*/
                { nombre: "Ángulo naso-labial", valor: 102, valorRegular: 102, descripcion:"1", menor:"Clase III Esqueletal", normal:"Clase I Esqueletal", mayor:"Clase II Esqueletal" },
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
        lineaMd: true,
        primerTercio: "",
        segundoTercio: "",
        tercerTercio: ""
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
        unionTercios() {
            this.paciente.fichaDeOrtodoncia.facialFrontal.tercios = "";
            this.paciente.fichaDeOrtodoncia.facialFrontal.tercios =
                this.primerTercio +
                "-" +
                this.segundoTercio +
                "-" +
                this.tercerTercio;
            return this.paciente.fichaDeOrtodoncia.facialFrontal.tercios;
        },
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
            this.paciente.boltonAnterior = 0;
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
                this.paciente.boltonAnterior = (sumMandibula / sumMaxilar) * 100;
            }
            return this.paciente.boltonAnterior.toFixed(1);
        },
        resultadoBoltonTotal() {
            this.paciente.boltonTotal = 0;
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
                this.paciente.boltonTotal = (sumMandibula / sumMaxilar) * 100;
            }
            return this.paciente.boltonTotal.toFixed(1);
        },
        lineaMediaMx(){
            return this.paciente.fichaDeOrtodoncia.lineasMedias.maxilar = this.lineaMx ? "normal" : "desviado";
        },
        lineaMediaMd(){
            return this.paciente.fichaDeOrtodoncia.lineasMedias.mandibula = this.lineaMd ? "normal" : "desviado";
        }

    }
});
