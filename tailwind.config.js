/** @type {import('tailwindcss').Config} */
export default {
    content: [
        "./resources/**/*.blade.php",
        "./resources/**/*.js",
        "./resources/**/*.vue",
        "./node_modules/flowbite/**/*.js",
        "./vendor/robsontenorio/mary/src/View/Components/**/*.php",
    ],
    theme: {
        extend: {
            animation: {
                "spin-slow": "spin 4s linear infinite",
            },
            fontFamily: {
                Inter: "Inter, sans-serif",
            },
        },
    },
    plugins: [require("flowbite/plugin"), require("daisyui")],
    daisyui: {
        themes: "light",
        base: true,
        styled: true,
        utils: true,
        prefix: "",
        logs: true,
    },
};
