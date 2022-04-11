export let stepperEventsMixin = {
    methods: {
        onBack() {
            this.$emit('cancel')
        },
        onComplete() {
            this.$emit('finish')
        },
    }
}

export let stepperControllerMixin = {
    data() {
        return {
            currentStepIndex: 0,
        }
    },

    methods: {
        onChangeStep(index) {
            this.currentStepIndex = index
        },
        onCancelStep() {
            if (this.currentStepIndex >= 1) {
                this.currentStepIndex--
            } else {
                this.$inertia.get(this.route('register'))
            }
        },
        onFinishStep() {
            if (this.currentStepIndex == this.steps.length - 1) {
                this.$inertia.get(this.route('login'))
            } else {
                this.currentStepIndex++
            }
        },
    }
}