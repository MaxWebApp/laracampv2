import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
        './vendor/awcodes/filament-curator/resources/**/*.blade.php',
        './node_modules/mary-ui/**/*.{js,jsx,vue}', // 添加 Mary UI 組件路徑
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ['Figtree', ...defaultTheme.fontFamily.sans],
            },
            // colors: {
            //     'sherry': '#1fb6ff',
            //     'tahiti': {
            //         100: '#cffafe',
            //         200: '#a5f3fc',
            //         300: '#67e8f9',
            //         400: '#22d3ee',
            //         500: '#06b6d4',
            //         600: '#0891b2',
            //         700: '#0e7490',
            //         800: '#155e75',
            //         900: '#164e63',
            //     },
            // },

            // colors: {
            //     // 添加 Mary UI 需要的顏色
            //     primary: '#333', // 這是示例值，您可以根據需要修改
            //     'base-100': '#ccc', // 這是示例值，您可以根據需要修改
            //     'cursor-pointer': 'pointer',
            // },

        },
    },

    // plugins: [forms],
    // plugins: [forms, typography],
    plugins: [
        require('@tailwindcss/forms'),
        require('daisyui'),
    ],
    // 如果您使用 daisyUI (Mary UI 有時依賴這個)
    daisyui: {
        themes: ["light", "dark"],
    },
};
