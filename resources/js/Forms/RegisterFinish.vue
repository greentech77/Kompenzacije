<template>

    <form @submit.prevent="onSubmit" class="space-y-4">

        <section class="bg-white rounded-md p-6 filter drop-shadow">
            <h2 class="text-lg font-medium mb-4">Podatki o podjetju</h2>
            <p class="mb-2"><strong>Ime podjetja: </strong>{{form.entityData.companyName}}</p>
            <p class="text-sm mb-2"><strong>Davčna številka: </strong>{{form.entityData.vatNum}}, <strong>Matična številka: </strong>{{form.entityData.registrationNum}} </p>
            <p class="text-sm mb-2"><strong>Ime: </strong>{{form.entityData.name}}, <strong>Priimek: </strong>{{form.entityData.lastname}} </p>
        </section>

        <section class="bg-white rounded-md p-6 filter drop-shadow">
            <h2 class="text-lg font-medium mb-4">Naslov in sedež podjetja</h2>
            <p class="text-sm mb-2"><strong>Naslov:</strong> {{ form.entityData.address }}, {{ form.entityData.postNum }} {{ form.entityData.postTown }} </p>
        </section>

        <section class="bg-white rounded-md p-6 filter drop-shadow">
            <h2 class="text-lg font-medium mb-4">Kontaktni podatki</h2>
            <p class="text-sm mb-2"><strong>Email:</strong> {{ form.entityData.email }}, <strong>Telefon:</strong> {{ form.entityData.phone }} </p>
        </section>

        <section class="bg-white rounded-md p-6 filter drop-shadow">
            <h2 class="text-lg font-medium mb-4">Transakcijski račun</h2>
            <p class="text-sm mb-2"><strong>IBAN številka računa:</strong> {{ form.entityData.bankAccount }}, <strong>BIC banke:</strong> {{ form.entityData.bankBIC }} </p>
            <p class="text-sm mb-2"><strong>Naziv banke:</strong> {{ form.entityData.bankName }} </p>
        </section>

        <section class="flex justify-end space-x-4">
            <Button class="button button--white" @click="onBack" :disabled="form.processing">Nazaj</Button>
            <Button class="button button--stone" type="submit" :loading="form.processing">Zaključi vnos</Button>
        </section>

    </form>
   
</template>

<script>
import Button from '@/Components/Button.vue'
import { stepperEventsMixin } from './steppedMixins'
import { fakeRegisterFinishMixin } from '@/mixins/faker'
import { dateFormat, booleanFormat } from '@/mixins/filters'
//import addressMixin from '@/mixins/address'

export default {

    components: {
        Button
    },

    props: {
        forms: Object,
    },

    mixins: [stepperEventsMixin, fakeRegisterFinishMixin],

    data() {
        return {
            form: this.$inertia.form({
                entityData: this.forms.entityData.data()
            })
        }
    },

    methods: {
        onSubmit() {
            this.form.post(this.route('register.entity'), {
                preserveScroll: true,
                onError: errors => {
                    for (const [key, value] of Object.entries(errors)) {
                        const splitKey = key.split('.')
                        const root = splitKey.shift()
                        const domain = splitKey.join('.')
                        this.forms[root].errors[domain] = value
                        this.forms[root].hasErrors = true
                    }
                }
            })
        },
        dateFormat,
        booleanFormat
    }

}
</script>