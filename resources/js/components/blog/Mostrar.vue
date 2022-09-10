<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="table-responsive">
                    <table class="table table-bordered">
                        <thead class="bg-primary text-white">
                            <tr>
                                <td>ID</td>
                                <td>Título</td>
                                <td>Contenido</td>
                                <td>Acciones</td>
                            </tr>
                        </thead>
                        <tbody>
                            <tr v-for="blog in blogs" :key="blog.id">
                                <td>{{ blog.id }}</td>
                                <td>{{ blog.titulo }}</td>
                                <td>{{ blog.contenido }}</td>
                                <td>
                                    <router-link 
                                        :to='{name:"editarBlog", params:{id:blog.id}}'
                                        class="btn btn-info">
                                        <i class="far fa-edit"></i>
                                    </router-link>
                                    <a type="button" 
                                        @click="borrarBlog(blog.id)" 
                                        class="btn btn-danger">
                                        <i class="fas fa-trash"></i>
                                    </a>                        
                                </td>
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
    name:"blogs",
    data(){
        return{
            blogs: []
        }
    },
    mounted(){
        this.mostrarBlogs()
    },
    methods:{
        async mostrarBlogs(){
            await this.axios.get('/blog')
                .then( response=>{
                    this.blogs = response.data
                })
                .catch( error => {
                    this.blogs = []
                })
        },
        borrarBlog(id){
            if ( confirm("¿Desea eliminar el registro?") ){
                this.axios.delete(`/blog/${id}`)
                .then( response=>{
                    console.log( response )
                    this.$router.push({name:"mostrarBlogs"})
                })
                .catch( error => {
                    console.log(error);
                })
            }
        }
    }
}
</script>