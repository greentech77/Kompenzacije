<template>
    <Date v-model="proxy" :error="!!error" v-if="type == 'date'" :startingView="startingView" :name="name"/>
    <Select v-model="proxy" :error="!!error" v-else-if="type == 'select'" :name="name" :options="options" />
    <FormattedInput 
        v-else-if="type == 'unit' || type == 'currency'" 
        v-model="proxy"
        class="border border-stone-50 rounded-md bg-white w-full px-3 py-2 focus:ring-0 focus:border-stone filter focus:shadow transition duration-150 disabled:opacity-50 disabled:select-none"
        :class="{ '!border-red-600 border-opacity-30 !bg-red-50 focus:border-opacity-100 focus:!bg-red-100': error }" 
        ref="input"
        :type="type" 
        :name="name"
        :id="name"
        :disabled="disabled"
        @change="onChange"
        @input="onInput"
        @blur="onBlur"
        :placeholder="placeholder"
    />
    <textarea 
        v-model="proxy" 
        v-else-if="type == 'textarea'" 
        class="border border-stone-50 rounded-md bg-white w-full px-3 py-2 focus:ring-0 focus:border-stone filter focus:shadow transition duration-150 disabled:opacity-50 disabled:select-none"
        :class="{ '!border-red-600 border-opacity-30 !bg-red-50 focus:border-opacity-100 focus:!bg-red-100': error }" 
        :error="!!error" 
        :name="name" 
        :options="options" 
        @change="onChange" 
        :disabled="disabled" 
        rows="5" 
    ></textarea>
    <input 
        v-else
        class="border border-stone-50 rounded-md bg-white w-full px-3 py-2 focus:ring-0 focus:border-stone filter focus:shadow transition duration-150 disabled:opacity-50 disabled:select-none"
        :class="{ '!border-red-600 border-opacity-30 !bg-red-50 focus:border-opacity-100 focus:!bg-red-100': error }" 
        v-model="proxy" 
        :type="type ?? `text`" 
        ref="input"
        :name="name"
        :id="name"
        :disabled="disabled"
        v-show="type != 'file'"
        @change="onChange"
        @input="onInput"
        @blur="onBlur"
        :placeholder="placeholder"
        :autocomplete="autocomplete"
    >
</template>

<script>
import Date from '@/Components/Date.vue'
import Select from '@/Components/Select.vue'
import FormattedInput from '@/Components/FormattedInput.vue'

export default {
    components: {
        Date,
        Select,
        FormattedInput
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