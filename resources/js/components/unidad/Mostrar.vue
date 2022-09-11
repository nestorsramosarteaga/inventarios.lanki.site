<template>
    <div class="container">
        <div class="row mb-2">
            <form @submit.prevent="mostrarUnidades" class="d-flex" >
                <input 
                    class="form-control me-2" 
                    type="search" 
                    v-model="params.filtro" 
                    placeholder="Filtrar por nombre de empresa" 
                    aria-label="Search">
                <button class="btn btn-primary" type="submit">Buscar</button>
            </form>
        </div>
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <td>ID</td>
                                <td>Código</td>
                                <td>Tipo UA</td>
                                <td>Marca</td>
                                <td>Procesador</td>
                                <td>Cliente</td>
                                <td>Generacion</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="unidad in unidades.data" :key="unidad.id">
                                <td>{{ unidad.id }}</td>
                                <td>{{ unidad.codigo }}</td>
                                <td>{{ unidad.tipo_ua }}</td>
                                <td>{{ unidad.marca }}</td>
                                <td>{{ unidad.procesador }}</td>                                
                                <td>{{ unidad.client.empresa }}</td>
                                <td>{{ unidad.generacion }}</td>
                            </tr>
                        </tbody>
                    </table>
                    
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:"unidades",
    data(){
        return{
            unidades: [],
            params:{
                filtro: null
            },
        }
    },
    mounted(){
        this.mostrarUnidades()
    },
    methods:{
        async mostrarUnidades(){
            await this.axios.get('/v1/unidad',{params: this.params})
                .then( response=>{
                    this.unidades = response
                })
                .catch( error => {
                    this.unidades = []
                })
        },
        
    }
}
</script>