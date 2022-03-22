const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './resources/js/**/*.vue',
        './node_modules/@protonemedia/inertiajs-tables-laravel-query-builder/**/*.{js,vue}',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Roboto', ...defaultTheme.fontFamily.sans],
                serif: ['Cormorant Garamond', ...defaultTheme.fontFamily.serif]
            },
            colors: {
                blue: {
                    DEFAULT: 'var(--blue)',
                    hover: 'var(--blue-hover)'
                },
                stone: {
                    DEFAULT: 'var(--stone)',
                    hover: 'var(--stone-hover)',
                    '15': 'var(--stone-15)',
                    '30': 'var(--stone-30)',
                    '30-hover': 'var(--stone-30-hover)',
                    '50': 'var(--stone-50)',
                },
                cyan: {
                    DEFAULT: 'var(--cyan)',
                    hover: 'var(--cyan-hover)'
                },
                orange: {
                    DEFAULT: 'var(--orange)',
                    hover: 'var(--orange-hover)'
                }
            },
            spacing: {
                '112': '28rem'
            }   
        },
        container: {
            center: true,
        }
    },

    corePlugins: {
        float: false,
    },

    plugins: [require('@tailwindcss/forms')],
};
