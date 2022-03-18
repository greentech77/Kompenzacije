<template>

    <div class="locale-switch">
        <button @click="setLocale(locale)" v-for="locale in available" :key="locale" class="locale-switch__button" :class="{'locale-switch__button--active': currentLocale == locale}">{{locale}}</button>
    </div>

</template>

<script>
import { get as getLocale, post as postLocale } from '@/services/locale';

export default {
    data () {
        return {
            currentLocale: undefined
        }
    },
    computed: {
        available() {
            return _.union([this.$root.$i18n.fallbackLocale], this.$root.$i18n.availableLocales);
        }
    },
    watch: {
        '$i18n.locale': function(newLocale) {
            this.currentLocale = newLocale;
        }
    },
    mounted() {
        this.currentLocale = this.$root.$i18n.locale;
    },
    methods: {
        async setLocale(locale) {
            if (!this.$root.$i18n.messages[locale]) {
                const data = await getLocale(locale);
                this.$root.$i18n.setLocaleMessage(locale, data.messages[locale]);
            } else {
                await postLocale(locale);
            }
            localStorage.setItem('locale', locale);
            this.$root.$i18n.locale = locale;
            document.documentElement.lang = locale;
        }
    }
}
</script>

<style lang="postcss">

    .locale-switch {
        @apply flex flex-row text-sm;

        & > :not(:last-child):after {
            content: '';
            @apply border-r border-white absolute -right-2 h-full;
        }
        &__button {
            @apply mx-2 uppercase relative border-b border-transparent text-white;

            &:first-child {
                @apply ml-0
            }
            &:last-child {
                @apply mr-0;
            }
            &--active {
                @apply border-white pointer-events-none;
            }
        }


    }

</style>