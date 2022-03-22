import { Inertia } from '@inertiajs/inertia'

export default {

    data() {
        return {
            currentRoute: ''
        }
    },

    created() {
        Inertia.on('navigate', (event) => {
            this.currentRoute = this.route().current()
        })
    },

    methods: {
        activeRoute(name) {
            return this.currentRoute.startsWith(name); 
        }
    }

}