<template>

    <form @submit.prevent="onSubmit" class="space-y-4">
        
        <section class="bg-white rounded-md p-6 filter drop-shadow space-y-4">
            <h2 class="text-lg font-medium">Osnovni podatki</h2>
            <div>
                <InputGroup v-model="form.companyName" name="companyName" label="Naziv podjetja" :error="form.errors.companyName" @change="form.clearErrors('companyName')"/>
            </div>

            <div class="flex space-y-4 md:space-y-0 md:space-x-4 flex-wrap md:flex-nowrap">
                <InputGroup class="flex-auto w-full md:w-auto" v-model="form.vatNum" name="vatNum" label="Davčna številka" :error="form.errors.vatNum" @change="form.clearErrors('vatNum')"/>
                <InputGroup class="flex-auto w-full md:w-auto" v-model="form.registrationNum" name="registrationNum" label="Matična številka" :error="form.errors.registrationNum" @change="form.clearErrors('registrationNum')"/>
            </div>

            <div class="flex space-y-4 md:space-y-0 md:space-x-4 flex-wrap md:flex-nowrap">
                <InputGroup class="flex-auto w-full md:w-auto" v-model="form.name" name="name" label="Ime" :error="form.errors.name" @change="form.clearErrors('name')"/>
                <InputGroup class="flex-auto w-full md:w-auto" v-model="form.lastname" name="lastname" label="Priimek" :error="form.errors.name" @change="form.clearErrors('lastname')"/>
            </div>

        </section>

        <section class="bg-white rounded-md p-6 filter drop-shadow space-y-4">
            <h2 class="text-lg font-medium">Kontaktni podatki</h2>
            <div class="flex space-y-4 md:space-y-0 md:space-x-4 flex-wrap md:flex-nowrap">
                <InputGroup class="flex-auto w-full md:w-auto" v-model="form.email" name="email" label="Email" :error="form.errors.email" @change="form.clearErrors('email')"/>
                <InputGroup class="flex-auto w-full md:w-auto" v-model="form.phone" name="phone" label="Telefon" :error="form.errors.phone" @change="form.clearErrors('phone')"/>
            </div>
        </section>

        <section class="bg-white rounded-md p-6 filter drop-shadow space-y-4 relative z-10">
            <h2 class="text-lg font-medium">Naslov in sedež podjetja</h2>
            <div>
                <InputGroup v-model="form.address" label="Ulica in hišna številka" name="address" :error="form.errors['address']" @change="form.clearErrors('address')"/>
            </div>
            <div class="flex space-y-4 md:space-y-0 md:space-x-4 flex-wrap md:flex-nowrap">
                <InputGroup class="w-full md:w-1/3 flex-auto" v-model="form.postNum" name="postNum" label="Poštna številka" :error="form.errors['postNum']" @change="form.clearErrors('postNum')" @blur="onPostCodeBlur(form)"/>
                <InputGroup class="w-full md:w-2/3 flex-auto" v-model="form.postTown" name="postTown" label="Pošta" :error="form.errors['postTown']" @change="form.clearErrors('postTown')"/>
            </div>
        </section>

        <section class="bg-white rounded-md p-6 filter drop-shadow space-y-4">
            <h2 class="text-lg font-medium">Transakcijski račun</h2>
            <div class="flex space-y-4 md:space-y-0 md:space-x-4 flex-wrap md:flex-nowrap">
                <InputGroup class="w-full md:w-2/3 flex-auto " v-model="form.bankAccount" name="bankAccount" label="IBAN številka računa" :error="form.errors['bankAccount']" @change="form.clearErrors('bankAccount')" @blur="verifyIBAN(form.bankAccount)"/>
            </div>
            <div class="flex space-y-4 md:space-y-0 md:space-x-4 flex-wrap md:flex-nowrap">
                <InputGroup class="w-full md:w-1/3 flex-auto " v-model="form.bankBIC" name="bankBIC" label="BIC banke" :error="form.errors['bankBIC']" @change="form.clearErrors('bankBIC')"/>
                <InputGroup class="flex-auto w-full md:w-auto" v-model="form.bankName" name="bankName"  label="Naziv banke" :error="form.errors['bankName']" @change="form.clearErrors('bankName')"/>
            </div>
        </section>

        <section class="flex justify-end space-x-4">
            <Button class="button button--white" :disabled="form.processing" @click="onBack">Nazaj</Button>
            <Button class="button button--stone" type="submit" :loading="form.processing">Naprej</Button>
        </section>

    </form>
   
</template>

<script>
import Button from '@/Components/Button.vue'
import InputGroup from '@/Components/InputGroup.vue'
import Label from '@/Components/Label.vue'
import { fakeRegisterDataMixin } from '@/mixins/faker'
import { stepperEventsMixin } from './steppedMixins'
import addressMixin from '@/mixins/address'
//import ibanMixin from '@/mixins/iban'

export default {

    components: {
        Button,
        InputGroup,
        Label
    },

    props: {
        form: Object,
    },

    mixins: [stepperEventsMixin, fakeRegisterDataMixin, addressMixin],

    methods: {
        onSubmit() {
            this.form.post(this.route('register.data'), {
                _error_bag: 'CreateUser',
                onSuccess: () => {
                    this.onComplete()
                },
            })
        }
    }

}
</script>

<style lang="postcss">

    @import '../../css/form.css';

</style>