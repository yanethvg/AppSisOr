
new Vue({
	el: '#crud_usuario',
	created: function() {
		this.getUsuarios();
	},
	data: {
		usuarios: [],
		pagination: {
			'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0
		},
		newKeep: '',
		fillUsuario: {'nombre': '', 'email': '','usuario':''},
		errors: '',
		offset: 10,
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
		getUsuarios: function(page) {
			var urlusuarios = 'usuarios/list?page='+page+'&q='+encodeURI;
			axios.get(urlusuarios).then(response => {
				this.usuarios = response.data;
				this.pagination = response;
			});
		},


		changePage: function(page) {
			this.pagination.current_page = page;
			this.getUsuarios(page);
		}
	}
});
















