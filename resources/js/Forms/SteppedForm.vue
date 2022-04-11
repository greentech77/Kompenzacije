<template>
    
    <div class="bg-stone-15 px-8 py-8 rounded-md">
        <template v-for="(step, index) in steps" :key="index">
            <section class="flex items-top items-start flex-wrap lg:flex-nowrap">
                <div class="flex mr-8 mt-5 lg:w-1/4 items-start" @click="onChangeStep(step)" :class=" { 'pointer-events-none': !canGotoStep(step), 'opacity-30 pointer-events-none': isBypassStep(step), 'cursor-pointer hover:text-blue-hover': canGotoStep(step) }">
                    <div class="w-6 h-6 flex-none rounded-full font-bold text-white flex items-center justify-center mr-4" :class="{'!bg-red-600': hasErrors(step) && !isBypassStep(step), 'bg-orange': index == currentStepIndex, 'bg-blue hover:bg-blue-hover': index != currentStepIndex}">
                        <span v-if="hasErrors(step) && !isBypassStep(step)">!</span>
                        <PencilIcon class="h-4 v-4 cursor-pointer" v-else-if="isPrior(step) && canGotoStep(step)"/>
                        <XIcon v-else-if="isBypassStep(step)" class="h-4 v-4"/>
                        <span v-else>{{index + 1}}</span>
                    </div>

                    <div class="font-lg leading-6 flex-auto" :class="{'font-bold': step == currentStep, '!text-red-600': hasErrors(step) && !isBypassStep(step)}">
                        {{step.title}}
                    </div>
                </div>

                <div v-if="index == currentStepIndex" class="lg:w-3/4 w-full mt-4 lg:mt-0 ml-0 sm:ml-10 lg:ml-0">
                    <slot :name="`step-${index}`" />
                </div>
            </section>
            
        </template>
    </div>

</template>

<script>
import { PencilIcon, XIcon } from '@heroicons/vue/outline';

export default {
    
    props: {
        steps: Array,
        currentStepIndex: Number
    },

    emits: ['update:currentStepIndex'],

    components: {
        PencilIcon,
        XIcon,
    },

    methods: {
        gotoStepIndex(index) {
            this.$emit('update:currentStepIndex', index)
        },
        onChangeStep(step) {
            if (this.canGotoStep(step)) {
                this.gotoStepIndex(this.steps.indexOf(step))
            }
        },
        isBypassStep(step) {
            return step.bypass
        },
        canGotoStep(step) {
            if (this.isCurrentStep(step)) {
                return false
            }
            if (this.isBypassStep(step)) {
                return false
            }
            return this.isPrior(step) || this.allPriorValid(step)
        },
        canBeOnStep(step) {
            if (this.isBypassStep(step)) {
                return false
            }
            return this.isPrior(step) || this.allPriorValid(step) || this.hasErrors(step)
        },
        isCurrentStep(step) {
            return step == this.currentStep
        },
        isPrior(step) {
            return this.currentStepIndex > this.steps.indexOf(step)
        },
        allPriorValid(step) {
            const index = this.steps.indexOf(step)
            if (index == 0) {
                return true
            }
            for (let i = 0; i < index; i++) {
                if (!this.steps[i].valid) {
                    return false
                }
            }
            return true
        },
        hasErrors(step) {
            return step.props.form?.hasErrors
        }
    },

    watch: {
        currentStepIndex(newValue, oldValue) {
            this.$nextTick(() => {
                if (this.currentStepIndex == this.steps.length - 1) {
                    return
                }
                if (!this.canBeOnStep(this.currentStep)) {
                    if (newValue > oldValue) {
                        this.gotoStepIndex(this.currentStepIndex + 1)
                    }
                    if (newValue < oldValue) {
                        this.gotoStepIndex(this.currentStepIndex - 1)
                    }
                }
            })
        },
    },

    computed: {
        currentStep() {
            return this.steps[this.currentStepIndex]
        }
    }

}
</script>