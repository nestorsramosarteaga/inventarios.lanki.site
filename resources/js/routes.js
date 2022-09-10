const Home = ()=> import('./components/Home.vue')

// imporatr componentes para unidades
const MostrarUnidad = ()=> import('./components/unidad/Mostrar.vue')

export const routes = [
    {
        name: 'home',
        path: '/',
        component: Home
    },
    {
        name: 'mostrarUnidades',
        path: '/unidades',
        component: MostrarUnidad
    },
]
