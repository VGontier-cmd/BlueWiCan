import { defineConfig } from 'vite';
import laravel from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        laravel({
            input: [
                'resources/js/app.js',
                'resources/sass/app.scss',
                'resources/js/auth.js',
                'resources/sass/auth.scss',
                'resources/js/docs.js',
                'resources/sass/docs.scss'
            ],
            refresh: true,
        }),
    ],
});
