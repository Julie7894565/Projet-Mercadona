/** @type {import('tailwindcss').Config} */
module.exports = {
    content: ['./templates/**/*.html.twig', './node_modules/flowbite/**/*.js', "./src/**/*.{html,js}", "./node_modules/tw-elements/dist/js/**/*.js"],
    theme: {
        extend: {},
    },
    plugins: [require('flowbite/plugin')],
}