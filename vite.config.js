import { defineConfig } from "vite";
import laravel from "laravel-vite-plugin";

export default defineConfig({
    plugins: [
        laravel({
            input: [
                "resources/css/app.css",
                "resources/js/app.js",
                "resources/js/pengembalianSearch.js",
                "resources/js/peminjaman.js",
                "resources/js/dashboard.js",
                "resources/js/dashboardPeminjaman.js",
            ],
            refresh: true,
        }),
    ],
    resolve: {
        alias: {
            $: "jQuery",
        },
    },
});
