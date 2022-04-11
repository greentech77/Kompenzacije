import axios from 'axios';
import { find } from 'lodash' 

export default {

    computed: {
        countries() {
            return this.$page.props?.countries || []
        }
    },

    methods: {
        applyDefaultCountry(address) {
            this.$nextTick(() => {
                address.country = find(this.countries, { key: 'SI' })
            })
            return address
        },
        async onPostCodeBlur(form) {
            console.log(form.postNum);
            form.postNum = '' + form.postNum // to string
            const postCode = form.postNum.length == 4 && parseInt(form.postNum)
            if (postCode) {
                const response = await axios.get(this.route('api.post-code'), {
                    params: {
                        postCode
                    }
                })
                form.post = response.data.data?.post
            }
        }
    }

}