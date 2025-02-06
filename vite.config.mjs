import { defineConfig } from 'vite';
import  LaravelVitePlugin  from 'laravel-vite-plugin';

export default defineConfig({
    plugins: [
        new LaravelVitePlugin({
            input: ['resources/css/app.css', 'resources/js/app.js'],
            refresh: true,
        }),
    ],
});
