<template>
    <div class="container">
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
                            <tr v-for="unidad in unidades" :key="unidad.id">
                                <td>{{ unidad.id }}</td>
                                <td>{{ unidad.codigo }}</td>
                                <td>{{ unidad.tipo_ua }}</td>
                                <td>{{ unidad.marca }}</td>
                                <td>{{ unidad.procesador }}</td>                                
                                <td>{{ unidad.client_id }}</td>
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
            unidades: []
        }
    },
    mounted(){
        this.mostrarUnidades()
    },
    methods:{
        async mostrarUnidades(){
            await this.axios.get('/v1/unidad')
                .then( response=>{
                    console.log(response.data)
                    this.unidades = response.data
                })
                .catch( error => {
                    this.unidades = []
                })
        }
    }
}
</script>