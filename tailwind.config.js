/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
    ],
    theme: {
        extend: {
            colors: {
                "dark-gray": "#657786",
                "twitter-original": "#00acee",
                "twitter-teal": "#008080",
                "twitter-blue": "#26a7de",
            },
        },
    },
    plugins: [require("flowbite/plugin")],
};
