import type { Config } from 'tailwindcss'
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
        fontFamily: {
            'sans': ['Plus Jakarta Sans']
        }
    },
  },
  plugins: [flowbitePlugin],
} satisfies Config

