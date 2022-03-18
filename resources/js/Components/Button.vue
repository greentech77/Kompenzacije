<template>
    <button :type="type ?? `button`" class="button" :class="{ 'button--disabled': isDisabled }" :disabled="isDisabled">
        <div class="button__spinner" v-if="loading"></div>
        <div class="button__body" :class="{'button__body--hidden': hideSlot}">
            <slot />
        </div>
    </button>
</template>

<script>

export default {

    props: {
        type: String,
        loading: Boolean,
        disabled: Boolean
    },

    computed: {
        hideSlot() {
            return this.loading
        },
        isDisabled() {
            return this.disabled || this.loading || false 
        }
    },

}
</script>

<style lang="postcss">

    @import '../../css/button.css';

</style>