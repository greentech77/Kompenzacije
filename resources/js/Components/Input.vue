<template>
    <Date v-model="proxy" :error="!!error" v-if="type == 'date'" :startingView="startingView" :name="name"/>
    <Select v-model="proxy" :error="!!error" v-else-if="type == 'select'" :name="name" :options="options" />
    <input 
        v-else
        class="border border-stone-50 rounded-md bg-white w-full px-3 py-2 focus:ring-0 focus:border-stone filter focus:shadow transition duration-150 disabled:opacity-50 disabled:select-none"
        :class="{ '!border-red-600 border-opacity-30 bg-red-600 bg-opacity-10 focus:border-opacity-100 focus:bg-opacity-20': error }" 
        v-model="proxy" 
        :type="type ?? `text`" 
        ref="input"
        :name="name"
        :disabled="disabled"
    >
</template>

<script>
import Date from '@/Components/Date.vue'
import Select from '@/Components/Select.vue'

export default {
    components: {
        Date,
        Select
    },

    props: {
        modelValue: [String, Object, Number],
        type: String,
        autocomplete: String,
        error: Boolean,
        startingView: String,
        name: String,
        options: Array,
        disabled: Boolean
    },

    emits: ['update:modelValue'],

    methods: {
        focus() {
            this.$refs.input.focus()
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
    },
}
</script>