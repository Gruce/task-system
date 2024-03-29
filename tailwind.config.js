const defaultTheme = require('tailwindcss/defaultTheme');

module.exports = {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './vendor/laravel/jetstream/**/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        "./resources/**/**/**/**/*.blade.php",

    ],

    theme: {
        extend: {
            height: {
                'main': 'calc(100vh - 3rem)',
                'content': 'calc(100vh - 8rem)',
                'tasklist': 'calc(100vh - 23.5rem)',
                'minitasklist': 'calc(100vh - 39rem)',
                'projectfiles': 'calc(100vh - 25rem)',
                'profile': 'calc(100vh - 6rem)',
                'chart': 'calc(100vh - 22rem)'
            },
            fontFamily: {
                sans: ['Tajawal', ...defaultTheme.fontFamily.sans],
            },
            colors: {
                'primary': {
                    50: '#ebeafd',
                    100: '#cbc8fa',
                    200: '#aba7f6',
                    300: '#8c86f1',
                    400: '#6d66eb',
                    500: '#4f46e5',
                    600: '#3227de',
                    700: '#2920c0',
                    800: '#231c9e',
                    900: '#1d187d',
                },
                'secondary': {
                    50: '#f4f6fa',
                    100: '#dbe1ee',
                    200: '#c2cce1',
                    300: '#aab8d3',
                    400: '#92a3c5',
                    500: '#7b8fb6',
                    600: '#657ba6',
                    700: '#566990',
                    800: '#4a5977',
                    900: '#3d485e',
                },
                'success': {
                    50: '#f7fffa',
                    100: '#d1ffe4',
                    200: '#abffce',
                    300: '#85ffb8',
                    400: '#60ffa2',
                    500: '#3aff8c',
                    600: '#14ff76',
                    700: '#00ee63',
                    800: '#00c853',
                    900: '#01a144',
                },
                'warning': {
                    50: '#fff6e2',
                    100: '#ffebbc',
                    200: '#ffe097',
                    300: '#ffd571',
                    400: '#ffc94b',
                    500: '#ffbe26',
                    600: '#ffb300',
                    700: '#d79802',
                    800: '#b07d03',
                    900: '#8a6204',

                },
                'error': {
                    50: '#ffe9e8',
                    100: '#fec7c3',
                    200: '#fca59f',
                    300: '#fa847b',
                    400: '#f86358',
                    500: '#f44336',
                    600: '#f02314',
                    700: '#cf1d0f',
                    800: '#aa190f',
                    900: '#86150d',
                },
                'info': {
                    50: '#f7fcff',
                    100: '#d2ebff',
                    200: '#addafe',
                    300: '#89c9fc',
                    400: '#66b8fa',
                    500: '#43a7f7',
                    600: '#2196f3',
                    700: '#0e83e0',
                    800: '#0e6ebb',
                    900: '#0d5996',
                },
                'light': {
                    50: '#f5f5f5',
                    100: '#e2e3e3',
                    200: '#ced1d1',
                    300: '#b9c0c0',
                    400: '#a4b0b0',
                    500: '#8ea0a0',
                    600: '#779191',
                    700: '#637f7f',
                    800: '#516c6c',
                    900: '#3f5757',
                },
            }
        },
    },

    plugins: [require('@tailwindcss/forms'), require('@tailwindcss/typography')],
};
