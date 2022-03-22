<template>
    <div>
        <div class="flex items-end mb-1">
            <div class="flex-1">
                <Label :error="!!error" :for="labelSlug" v-slot:default="{ processLabel }">
                    <slot name="label">
                        {{processLabel(label)}}
                    </slot>
                </Label>
            </div>
            <div class="text-xs text-stone empty:hidden">
                <slot name="labelComment"></slot>
            </div>
        </div>
        <Input :name="name || labelSlug" v-if="edit" v-model="proxy" :error="!!error" :type="type" :autocomplete="autocomplete" :startingView="startingView" :options="options" @blur="$emit('blur', $event)" :disabled="disabled"></Input>
        <div v-else class="px-3 py-2 border border-transparent leading-6 w-full">
            <strong>{{inputValue}}</strong>
        </div>
        <InputError :error="error"/>
    </div>
</template>

<script>
import Input from '@/Components/Input.vue'
import Label from '@/Components/Label.vue'
import InputError from '@/Components/InputError.vue'
import Date from '@/Components/Date.vue'
import slugify from 'slugify'

export default {
    components: {
        Input,
        Label,
        InputError,
        Date
    },

    props: {
        modelValue: [String, Object, Number],
        error: Object,
        type: {
            type: String,
            default: 'text'
        },
        label: [String, Function],
        autocomplete: String,
        startingView: String,
        options: Array,
        name: String,
        disabled: Boolean,
        edit: {
            type: Boolean,
            default: true
        }
    },

    emits: ['update:modelValue', 'change', 'blur'],

    methods: {
        focus() {
            this.$refs.input.focus()
        }
    },

    watch: {
        proxy() {
            this.$emit('change', this.proxy)
        }
    },

    computed: {
        proxy: {
            get() {
                return this.modelValue
            },
            set(value) {
                this.$emit('update:modelValue', value)
            },
        },
        labelSlug() {
            return slugify(this.label, {
                lower: true,
                remove: /[*+~.()'"!:@]/g
            })
        },
        inputValue() {
            if (this.type == 'select') {
                return this.proxy.label
            } else {
                return this.proxy
            }
        }
    },
}
</script>

<style lang="postcss">

    .input {
        @apply w-full px-3 py-2 border border-gray-300 appearance-none rounded;
        @apply focus:outline-none focus:border-stone focus:ring-0 filter focus:shadow;
        @apply transition duration-300;

        &--error {
            @apply border-red-600 border-opacity-30 bg-red-600 bg-opacity-10;
            @apply focus:border-red-600 focus:border-opacity-100;
        }
    }

</style>
