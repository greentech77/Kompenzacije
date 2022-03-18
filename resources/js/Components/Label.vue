<template>
    <label class="text-stone inline-block" :class="{ '!text-red-600': error }" :for="for">
        <slot :processLabel="processLabel">
            {{value}}
        </slot>
    </label>
</template>

<script>
export default {
    props: {
        value: String,
        error: Boolean,
        for: String
    },
    methods: {
        processLabel(label) {
            return (label instanceof Function) ? label() : label
        }
    }
}
</script>

<style lang="postcss">

</style>
