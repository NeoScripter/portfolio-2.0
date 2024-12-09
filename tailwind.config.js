import defaultTheme from 'tailwindcss/defaultTheme';
import forms from '@tailwindcss/forms';

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        './vendor/laravel/framework/src/Illuminate/Pagination/resources/views/*.blade.php',
        './storage/framework/views/*.php',
        './resources/views/**/*.blade.php',
    ],

    theme: {
        extend: {
            fontFamily: {
                sans: ["Figtree", ...defaultTheme.fontFamily.sans],
                main: ['Helvetica Neue', ...defaultTheme.fontFamily.sans],
                serif: ['GaramondMTW04', ...defaultTheme.fontFamily.serif],
            },
            fontSize: {
                'xxxs': '0.5rem', // 8px
                'xxs': '0.625rem', // 10px
              },
            colors: {
                "black-primary": "#121618",
                "gray-primary": "#F5F5F5",
            },
            maxWidth: {
                "screen-3xl": "1440px",
            },
            maxHeight: {
                130: "32.5rem",
                148: "37rem",
            },
            minHeight: {
                96: "24rem",
                100: "25rem",
            },
            width: {
                ...generateWidths(40, 200),
            },
            height: {
                ...generateHeights(20, 200),
            },
            boxShadow: {
                "white-large": "0 0 20px 40px rgba(255, 255, 255, 1)",
            },
            gridTemplateColumns: {
                "auto-fit-300": "repeat(auto-fit, minmax(350px, 1fr))",
                "auto-fit-240": "repeat(auto-fit, minmax(240px, 1fr))",
                "auto-fit-150": "repeat(auto-fit, minmax(150px, 1fr))",
                "auto-fill-200": "repeat(auto-fill, minmax(240px, 1fr))",
            },
            flexBasis: {
                "1/6": "16.5%",
                "1/4": "25%",
                "1/2": "50%",
                "3/4": "75%",
                "2/3": "66%",
                "1/3": "33%",
                full: "100%",
            },
            screens: {
                "3xl": "1920px",
                "2sm": "450px",
            },
        },
        screens: {
            'sm': '768px',
            'md': '1200px',
            'lg': '1440px',
            'xl': '1640px',
            '2xl': '1920px'
        },
    },

    plugins: [forms],
};

/**
 * Function to generate custom width utilities
 * @param {number} start - starting value for custom widths
 * @param {number} end - ending value for custom widths
 * @returns {object} - object containing width classes
 */
function generateWidths(start, end) {
    let widths = {};
    for (let i = start; i <= end; i++) {
        widths[i] = `${i / 4}rem`;
    }
    return widths;
}

/**
 * Function to generate custom height utilities
 * @param {number} start - starting value for custom heights
 * @param {number} end - ending value for custom heights
 * @returns {object} - object containing height classes
 */
function generateHeights(start, end) {
    let heights = {};
    for (let i = start; i <= end; i++) {
        heights[i] = `${i / 4}rem`;
    }
    return heights;
}

