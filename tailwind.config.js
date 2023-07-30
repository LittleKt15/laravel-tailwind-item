/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js"
    ],
    theme: {
        extend: {},
    },
    safelist: [
        'bg-red-500',
        'text-3xl',
        'lg:text-4xl',
    ],
    plugins: [
        require('@tailwindcss/forms'),
        require('flowbite/plugin')
    ],
}

