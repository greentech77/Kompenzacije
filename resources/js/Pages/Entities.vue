<template>
    <Head title="Člani sklada"/>

    <div class="w-full bg-stone-15 p-8 rounded-md">
        <table class="bg-white w-full divide-y divide-stone">
            <thead class="text-white uppercase tracking-wider font-medium text-xs text-left">
                <tr>
                    <th scope="col" class="pl-6 py-3 rounded-tl-md bg-blue">
                        Ime podjetja
                    </th>
                    <th scope="col" class="pl-6 py-3 bg-blue">
                        Pošta
                    </th>
                    <th scope="col" class="pl-6 py-3 bg-blue">
                        Davčna številka
                    </th>
                    <th scope="col" class="pl-6 py-3 bg-blue">
                        Matična številka
                    </th>
                    <th scope="col" class="pl-6 py-3 bg-blue">
                        Email
                    </th>
                </tr>
            </thead>
            <tbody class="divide-y divide-stone">
                <tr v-for="entity in entities.data" :key="entity.vat_num" class="h-20 cursor-pointer hover:bg-gray-200" @click="viewEntity(entity)">
                    <td class="pl-6 py-4 whitespace-nowrap">
                        <strong>{{entity.company_name}}</strong>
                    </td>
                    <td class="pl-6 py-4 whitespace-nowrap">
                        {{entity.post_town}}
                    </td>
                    <td class="pl-6 py-4 whitespace-nowrap">
                        {{entity.vat_num}}
                    </td>
                    <td class="pl-6 py-4 whitespace-nowrap">
                        {{entity.registration_num}}
                    </td>
                    <td class="pl-6 py-4 whitespace-nowrap">
                        {{entity.email}}
                    </td>
                </tr>
            </tbody>
        </table>
        <pagination class="mt-6" :links="entities.links" />

        <!--Table
            :filters="queryBuilderProps.filters"
            :search="queryBuilderProps.search"
            :columns="queryBuilderProps.columns"
            :on-update="setQueryBuilder"
            :meta="users"
        >
            <template #head>
            <tr>
                <th @click.prevent="sortBy('centity.ompany_name')">Ime podjetja</th>
                <th v-show="showColumn('entity.post_town')" @click.prevent="sortBy('post_town')">Pošta</th>
                <th v-show="showColumn('entity.vat_num')" @click.prevent="sortBy('vat_num')">Davčna številka</th>
                <th v-show="showColumn('entity.registration_num')" @click.prevent="sortBy('registration_num')">Matična številka</th>
                <th v-show="showColumn('entity.email')" @click.prevent="sortBy('email')">Email</th>
            </tr>
            </template>

            <template #body>
            <tr v-for="entity in entities.data" :key="entity.vat_num">
                <td>{{ entity.company_name }}</td>
                <td v-show="showColumn('entity.post_town')">{{ entity.post_town }}</td>
                <td v-show="showColumn('entity.vat_num')">{{ entity.vat_num }}</td>
                <td v-show="showColumn('entity.registration_num')">{{ entity.registration_num }}</td>
                <td v-show="showColumn('entity.email')">{{ entity.email }}</td>
            </tr>
            </template>
        </Table-->
    </div>

</template>


<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import AdminLayout from '@/mixins/adminLayout'
import Pagination from '@/Components/Pagination'
//import { InteractsWithQueryBuilder, Tailwind2 } from '@protonemedia/inertiajs-tables-laravel-query-builder';

export default {
    //mixins: [InteractsWithQueryBuilder],

    layout: AdminLayout,

    components: {
        Head,
        Link,
        Pagination,
        //Table: Tailwind2.Table
    },

    props: {
        entities: Object,
    },

    methods: {
         viewEntity(entity) {
            this.$inertia.visit(this.route('entities.entity', {
                id: entity.id
            }))
        }
    }
}
</script>



