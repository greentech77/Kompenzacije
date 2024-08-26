<template>
    <Head title="Kompenzacije"/>
    <div class="w-full bg-stone-15 p-8 rounded-md">

        <div class="flex justify-end space-x-4 mb-6">

        <Button class="button button--stone" @click="addcompenzation()">Dodaj kompenzacijo</Button>

        </div>

        <table class="bg-white w-full divide-y divide-stone">
            <thead class="text-white uppercase tracking-wider font-medium text-xs text-left">
                <tr>
                    <th scope="col" class="pl-6 py-3 rounded-tl-md bg-blue">
                        Naziv kompenzacije
                    </th>
                    <th scope="col" class="pl-6 py-3 bg-blue">
                        Znesek
                    </th>
                    <th scope="col" class="pl-6 py-3 bg-blue">
                        Provizija
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone">
                <tr v-for="compenzation in compenzations.data" :key="compenzation.id" class="h-20 cursor-pointer hover:bg-gray-200" @click="viewCompenzation(compenzation)">
                    <td class="pl-6 py-4 whitespace-nowrap">
                        <strong>{{compenzation.name}}</strong>
                    </td>
                    <td class="pl-6 py-4 whitespace-nowrap">
                        {{compenzation.amount}}
                    </td>
                    <td class="pl-6 py-4 whitespace-nowrap">
                        {{compenzation.commission}}
                    </td>
                </tr>
            </tbody>
        </table>
        <pagination class="mt-6" :links="compenzations.links" />
    </div>

</template>


<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import AdminLayout from '@/mixins/adminLayout'
import Pagination from '@/Components/Pagination'
import Button from '@/Components/Button.vue'

export default {

    layout: AdminLayout,

    components: {
        Head,
        Link,
        Pagination,
        Button
    },

    props: {
        compenzations: Object,
    },

    methods: {
         viewCompenzation(compenzation) {
            this.$inertia.visit(this.route('compenzations.compenzation', {
                id: compenzation.id
            }))
        },
        addcompenzation() {
            this.$inertia.get(this.route('compenzations.compenzation.new'));
        }
    }
}
</script>



