import type {Config} from 'tailwindcss'
import flowbitePlugin from 'flowbite/plugin'

export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.ts",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            container: {
                center: true,
            },
            boxShadow: {
                'button-primary': '0px 21px 27px -10px rgba(96, 60, 255, 0.48)',
            },
            colors: {
                'primary': '#4318FF',
            },
            fontFamily: {
                'sans': ['Plus Jakarta Sans'],
            }
        },
    },
    plugins: [flowbitePlugin],
} satisfies Config

