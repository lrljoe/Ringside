import forms from '@tailwindcss/forms';
import typography from '@tailwindcss/typography';
import aspectRadio from '@tailwindcss/aspect-ratio';
const defaultTheme = import('tailwindcss/defaultTheme.js')

/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/views/*.blade.php",
        "./resources/views/**/*.blade.php",
        "./resources/js/*.js",
        "./vendor/rappasoft/laravel-livewire-tables/resources/views/*.blade.php",
        "./vendor/rappasoft/laravel-livewire-tables/resources/views/**/*.blade.php",
        "./app/Livewire/*.php",
        "./app/Livewire/**/*.php",
        "./vendor/wire-elements/modal/resources/views/*.blade.php",
        "./storage/framework/views/*.php",
    ],

    theme: {
        extend: {
            colors: {
                gray: {
                    100: '#F9F9F9',
                    200: '#F1F1F4',
                    300: '#DBDFE9',
                    400: '#C4CADA',
                    500: '#99A1B7',
                    600: '#78829D',
                    700: '#4B5675',
                    800: '#252F4A',
                    900: '#071437',
                },
            },
            fontSize: {
                '2sm': [
					'0.8125rem',								// 13px
					{
						lineHeight: '1.125rem' 		// 18px
					}
				],
            },
            spacing: {
                '2.25': '.563rem',
                '7.5': '1.875rem',
            },
            lineHeight: {
                '4.25': '1.125rem'
            },
            fontFamily: {
                sans: ['Inter', 'system-ui', 'sans-serif'],
            },
        },
    },

    plugins: [forms, typography, aspectRadio],
};
