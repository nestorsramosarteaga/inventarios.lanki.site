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
                    <!-- <div class="row">
                        
                        <div class="col-4 md-4"></div>
                        <div class="col-2 md-2"></div>
                        <div class="col-6 md-6">
                            <nav>
                                <ul class="pagination">
                                    <li class="page-item" :class="{disabled:pagination.page==1}">
                                        <a href="#" class="page-link" @click="pagination.page=1; listar();">&lt;</a>
                                    </li>
                                    <li class="page-item" :class="{disabled:pagination.page==1}">
                                        <a href="#" class="page-link" @click="pagination.page=1; listar();">&gt;</a>
                                    </li>
                                    <li class="page-item" :class="{disabled:pagination.page==1}">
                                        <a href="#" class="page-link" @click="pagination.page++; listar();">&laquo;</a>
                                    </li>
                                    <li class="page-item" :class="{disabled:pagination.page==unidades.last_page}">
                                        <a href="#" class="page-link" @click="pagination.page=unidades.last_page; listar();">&raquo;</a>
                                    </li>
                                    <li class="page-item" :class="{disabled:pagination.page==unidades.last_page}">
                                        <a href="#" class="page-link" @click="pagination.page--; listar();">1</a>
                                    </li>
                                </ul>
                            </nav>
                        </div>
                    </div> -->
                </div>
                <!-- <div class="table-responsive">
                    <table class="table table-bordered table-responsive"></table>
                </div> -->
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
            pagination:{
                per_page: 100,
                page: 1
            }
        }
    },
    mounted(){
        this.mostrarUnidades()
    },
    methods:{
        async mostrarUnidades(){
            await this.axios.get('/v1/unidad',{params: this.pagination})
                .then( response=>{
                    console.log(response.data)
                    this.unidades = response.data
                })
                .catch( error => {
                    this.unidades = []
                })
        },
        
    }
}
</script>