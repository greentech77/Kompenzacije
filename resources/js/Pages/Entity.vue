<template>
    <Head :title="entity.company_name"/>

    <div class="w-full bg-stone-15 p-8 rounded-md">
        <section class="flex flex-wrap lg:flex-nowrap space-x-4">
            <div class="bg-white rounded-md p-6 filter drop-shadow lg:w-1/4 space-y-4">
                <h1 class="text-2xl font-medium ">{{entity.company_name}}</h1>
            </div>

            <div class="lg:w-3/4 w-full mt-4 lg:mt-0 ml-0 sm:ml-10 lg:ml-0 space-y-4">
                <section class="bg-white rounded-md p-6 filter drop-shadow relative z-10">
                    <form @submit.prevent="onSubmitSection(formdata)" class="space-y-4">
                        <div class="flex items-center">
                            <h2 class="text-lg font-medium flex-auto">Osnovni podatki</h2>
                            <button class="button button--icon pl-3 text-stone hover:text-stone-hover" :disabled="formdata.edit" @click.prevent="toggleEditMode(formdata)">
                                <PencilAltIcon class="h-6 w-6"/>
                            </button>
                        </div>
                        <div class="flex space-y-4 md:space-y-0 md:space-x-4 flex-wrap md:flex-nowrap">
                            <InputGroup class="w-full md:w-1/4 flex-auto" v-model="formdata.form.vat_num" label="Davčna številka" :error="formdata.form.errors['vat_num']" @change="formdata.form.clearErrors('vat_num')" :edit="formdata.edit"/> 
                            <InputGroup class="w-full md:w-1/4 flex-auto" v-model="formdata.form.registration_num" label="Matična številka" :error="formdata.form.errors['registration_num']" @change="formdata.form.clearErrors('registration_num')" :edit="formdata.edit"/>
                            <InputGroup class="w-full md:w-1/4 flex-auto" v-model="formdata.form.name" label="Ime" :error="formdata.form.errors['name']" @change="formdata.form.clearErrors('name')" :edit="formdata.edit"/>
                            <InputGroup class="w-full md:w-1/4 flex-auto" v-model="formdata.form.lastname" label="Priimek" :error="formdata.form.errors['lastname']" @change="formdata.form.clearErrors('lastname')" :edit="formdata.edit"/>
                        </div>
                        <div class="flex items-center">
                            <h2 class="text-lg font-medium flex-auto">Kontaktni podatki</h2>
                        </div>
                        <div class="flex space-y-4 md:space-y-0 md:space-x-4 flex-wrap md:flex-nowrap">
                            <InputGroup class="w-full md:w-1/3 flex-auto" v-model="formdata.form.email" label="E-mail" :error="formdata.form.errors['email']" @change="formdata.form.clearErrors('email')" :edit="formdata.edit"/> 
                            <InputGroup class="w-full md:w-1/3 flex-auto" v-model="formdata.form.mobile" label="GSM" :error="formdata.form.errors['mobile']" @change="formdata.form.clearErrors('mobile')" :edit="formdata.edit"/>
                            <InputGroup class="w-full md:w-1/3 flex-auto" v-model="formdata.form.phone" label="Telefon" :error="formdata.form.errors['phone']" @change="formdata.form.clearErrors('phone')" :edit="formdata.edit"/>
                        </div>
                        <div class="flex items-center">
                            <h2 class="text-lg font-medium flex-auto">Naslov in sedež podjetja</h2>
                        </div>
                        <div class="flex space-y-4 md:space-y-0 md:space-x-4 flex-wrap md:flex-nowrap">
                            <InputGroup class="w-full md:w-1/3 flex-auto" v-model="formdata.form.address" label="Ulica in hišna številka" :error="formdata.form.errors['address']" @change="formdata.form.clearErrors('address')" :edit="formdata.edit"/> 
                            <InputGroup class="w-full md:w-1/3 flex-auto" v-model="formdata.form.post_num" label="Poštna številka" :error="formdata.form.errors['post_num']" @change="formdata.form.clearErrors('post_num')" :edit="formdata.edit"/>
                            <InputGroup class="w-full md:w-1/3 flex-auto" v-model="formdata.form.post_town" label="Pošta" :error="formdata.form.errors['post_town']" @change="formdata.form.clearErrors('post_town')" :edit="formdata.edit"/>
                        </div>
                        <div class="flex items-center">
                            <h2 class="text-lg font-medium flex-auto">Transakcijski račun</h2>
                        </div>
                        <div class="flex space-y-4 md:space-y-0 md:space-x-4 flex-wrap md:flex-nowrap">
                            <InputGroup class="w-full md:w-1/3 flex-auto" v-model="formdata.form.bank_account" label="IBAN številka računa" :error="formdata.form.errors['bank_account']" @change="formdata.form.clearErrors('bank_account')" :edit="formdata.edit"/> 
                            <InputGroup class="w-full md:w-1/3 flex-auto" v-model="formdata.form.bank_bic" label="BIC banke" :error="formdata.form.errors['bank_bic']" @change="formdata.form.clearErrors('bank_bic')" :edit="formdata.edit"/>
                            <InputGroup class="w-full md:w-1/3 flex-auto" v-model="formdata.form.bank_name" label="Naziv banke" :error="formdata.form.errors['bank_name']" @change="formdata.form.clearErrors('bank_name')" :edit="formdata.edit"/>
                        </div>
                        
                        
                        <div class="flex justify-end space-x-4" v-if="formdata.edit">
                            <Button class="button button--white" @click.prevent="resetSection(formdata)" :disabled="formdata.form.processing">Prekliči</Button>
                            <Button class="button button--stone" type="submit" :loading="formdata.form.processing">Shrani</Button>
                        </div>
                    </form>
                </section>
            </div>
        </section>        
    </div>

    <div class="max-w-8xl mx-auto w-full flex-auto justify-center py-12">
        <h2 class="text-lg mb-5 font-medium flex-auto">Kompenzacije</h2>
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
            </tbody>
               
            </table>
        </div>
    </div>
</template>

<script>
import { Head, Link } from '@inertiajs/inertia-vue3'
import AdminLayout from '@/mixins/adminLayout'
import InputGroup from '@/Components/InputGroup.vue'
import { PencilAltIcon } from '@heroicons/vue/outline';
import Label from '@/Components/Label.vue'
import Button from '@/Components/Button.vue'

export default {
    layout: AdminLayout,

    components: {
        Head,
        Link,
        InputGroup,
        PencilAltIcon,
        Label,
        Button
    },

    props: {
        entity: Object
    },

    data() {
        const data = {}

        data['formdata'] = {
            form: this.$inertia.form({
                ...this.entity,
                action: 'update'
            }),
            edit: false
        }

        return {
            ...data,
        }
    },

    created() {
        //console.log(this.entity);
    },

    methods: {
        toggleEditMode(section, state) {
            if (state !== undefined) {
                section.edit = state
            } else {
                section.edit = !section.edit
            }
        },
        resetSection(section) {
            section.form.reset()
            this.toggleEditMode(section)
        },
        onSubmitSection(section) {
            console.log(section.form);
            section.form.patch(this.route('entities.entity.patch', {
                id: this.entity.id
            }),{
                onSuccess: () => {
                    this.toggleEditMode(section, false)
                }
            })
        }
    },

}
</script>

<style lang="postcss">


</style>