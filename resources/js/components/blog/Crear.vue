<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-header">
                        <h4>Crear Blog</h4>
                    </div>
                    <div class="card-body">
                        <form @submit.prevent="crear">
                            <div class="row">
                                <div class="col-12 mb-2">
                                    <div class="form-group">
                                        <label>Título</label>
                                        <input 
                                            v-model="blog.titulo" 
                                            type="text" 
                                            class="form-control">
                                    </div>
                                </div>
                                <div class="col-12 mb-2">
                                    <div class="form-floating">
                                        <textarea
                                            v-model="blog.contenido"
                                            class="form-control" 
                                            id="floatingTextarea" 
                                            rows="3"></textarea>
                                        <label for="floatingTextarea" >Contenido</label>
                                    </div>
                                </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-primary">Guardar</button>
                                </div>
                            </div>

                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name: "crear-blog",
    data(){
        return {
            blog:{
                titulo:"",
                contenido:""
            }
        }
    },
    methods: {
        async crear(){
            await this.axios.post(`/blog`, this.blog)
            .then(response=>{
                this.$router.push({name:"mostrarBlogs"})
            })
            .catch(error=>{
                console.log(error)
            })
        }
    }
}
</script>