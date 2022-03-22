<template>
    <input class="rounded !border-none !ring-0 bg-stone-30 checked:bg-stone checked:hover:bg-stone-hover checked:focus:bg-stone-hover mr-3" :id="name" type="checkbox" v-model="proxy"> 
    <slot name="label">
        <label class="hover:text-blue-hover" :for="name">{{label}}</label>
    </slot>
</template>

<script>
export default {
    emits: ['update:modelValue'],

    props: {
        modelValue: Boolean,
        label: String,
        name: String
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

<style lang="postcss" scoped>

    [type=checkbox] {
        box-shadow: none !important;
    }

</style>