new Vue({

    el: "#crud",
    created() {
        this.getPacientes();
    },
    data:{
        pacientes:[],
        pagination: {
            'total': 0,
            'current_page': 0,
            'per_page': 0,
            'last_page': 0,
            'from': 0,
            'to': 0
        },
        errors:{},
        offset:2,
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
        getPacientes: function(page){
            let url="/pacientes/list?page="+page;
            axios.get(url).then(response=> {
                this.pacientes=response.data.pacientes.data;
                this.pagination=response.data.pagination;
            });
        },
        changePage: function(page) {
			this.pagination.current_page = page;
			this.getPacientes(page);
        },
        editPaciente: function(id){
            let url=`/pacientes/${id}/edit`;
            return url;
        },
        showPaciente: function(id){
            let url=`/pacientes/${id}`;
            return url;
        },

    }

});
