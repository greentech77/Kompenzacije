<template>
    <div class="text-xs text-red-600 mt-1" v-if="!!error">{{ error }}</div>
</template>

<script>
export default {
    props: {
        error: String
    }
}
</script>