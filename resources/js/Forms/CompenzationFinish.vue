<template>

    <form @submit.prevent="onSubmit" class="space-y-4">

        <section class="bg-white rounded-md p-6 filter drop-shadow">
            <h2 class="text-lg font-medium mb-4">Podatki o kompenzaciji</h2>
            <p class="mb-2"><strong>Datum: </strong>{{dateFormat(form.compenzationData.compenzationDate)}}</p>
            <p class="mb-2"><strong>Znesek: </strong>{{form.compenzationData.compenzationAmount.toLocaleString('sl-SI', {style: 'currency', currency: 'EUR', currencyDisplay: 'code'})}}</p>
        </section>

        <section class="bg-white rounded-md p-6 filter drop-shadow">
            <h2 class="text-lg font-medium mb-4">Stranke</h2>

            <p v-for="(entity, index) in form.compenzationData.compenzationEntities" :key="entity.key">
                Stranka {{ index + 1 }}: {{ entity.label }}
            </p>

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
                compenzationData: this.forms.compenzationData.data()
            })
        }
    },
    async mounted() {
     console.log(this.forms.compenzationData.data());
    },

    methods: {
        onSubmit() {
            this.form.post(this.route('compenzation.add'), {
          
            })
        },
        dateFormat,
        booleanFormat
    }

}
</script>