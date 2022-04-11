import axios from 'axios';

export default {

    methods: {
        async verifyIBAN(account) {
            if (!account.IBAN) {
                return
            }
            const iban =  account.IBAN.toUpperCase().replace(/\s+/g, '')
            if (iban.length == 19 && iban.startsWith('SI56')) {
                const response = await axios.get(route('api.verify-iban'), {
                    params: {
                        'iban': iban
                    }
                })
                if (response.data.status == 'success') {
                    Object.assign(account, response.data.data)
                }
            }
        }
    }

}