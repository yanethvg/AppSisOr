
new Vue({

    el: "#crud",
    created() {
        this.getUsuarios();
    },
    data:{
        usuarios:[],
        roles:[],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0
        },
        newUsuario: {
            'nombre':null,
            'usuario':null,
            'email': null,
            'rol':null

        },
        fillUsuario:{
            'nombre':null,
            'usuario':null,
            'email': null,
            'rol':null
        },

        errors:{},
        offset:2,
        usuarioActual: '',
        passwordTemporal:''
    },

    computed: {
		isActived: function() {
			return this.pagination.current_page;
		},
		pagesNumber: function() {
			if(!this.pagination.to){
				return [];
			}

			var from = this.pagination.current_page - this.offset;
			if(from < 1){
				from = 1;
			}

			var to = from + (this.offset * 2);
			if(to >= this.pagination.last_page){
				to = this.pagination.last_page;
			}

			var pagesArray = [];
			while(from <= to){
				pagesArray.push(from);
				from++;
			}
			return pagesArray;
        }

    },
    methods: {
        getUsuarios: function(page){
            let url="/usuarios/list?page="+this.pagination.current_page;
            axios.get(url).then(response=> {
                this.usuarios=response.data.users.data;
                this.pagination=response.data.pagination;
                this.roles=response.data.roles;
            });
        },
        changePage: function(page) {
			this.pagination.current_page = page;
			this.getUsuarios(page);
        },
        showCreate: function(){
            this.errors={};
            $("#create").modal('show');
        },

        createUser: function() {
            let url = 'usuarios';

            axios.post(url, this.newUsuario)
                .then(response => {
                    this.getUsuarios();

                    this.errors = {};
                    this.usuarioActual=response.data.usuario;
                    this.passwordTemporal=response.data.password;

                    document.getElementById("showing-info").style.display='block';
                    setTimeout(()=>{
                        document.getElementById("showing-info").style.display='none';
                        $('#create').modal('hide');
                        toastr.success('Nuevo usuario  con éxito');
                    },5000);

                    this.newUsuario=  {
                        'nombre':null,
                        'usuario':null,
                        'email': null,
                        'rol':null

                    } ;

			    }).catch(error => {

                    this.errors=error.response.data.errors

            	});
        },

        toggleUsuario: function(id){
            let url='usuarios/toggle/'+id;
            axios.put(url).then((response)=>{
                this.getUsuarios();

                toastr.success(response.data.estado);
            })
            .catch((error)=>{
                console.log(error);
            });
        },
        showUsuario: function(usuario){
            this.fillUsuario={
                'id':usuario.id,
                'nombre':usuario.nombre,
                'usuario':usuario.usuario,
                'email': usuario.email,
                'rol':usuario.roles[0].slug
            }

            this.errors={};

          $("#edit").modal('show');
        }
        ,
        updateUsuario: function(){

            let url='usuarios/update/'+this.fillUsuario.id;
            axios.put(url, this.fillUsuario ).then((response)=>{
                this.getUsuarios();
                this.errors = {};
                this.usuarioActual=response.data.respuesta;
                toastr.success(response.data.respuesta);
            })
            .catch((error)=>{
                this.errors=error.response.data.errors
            });
        }
    }

});

