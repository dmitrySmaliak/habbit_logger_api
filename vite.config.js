import react from '@vitejs/plugin-react';
import laravel from 'laravel-vite-plugin';
import { defineConfig } from 'vite';
import tailwindcss from '@tailwindcss/vite'
import path from 'path';

export default defineConfig({
	plugins: [
		laravel({
			input: ['resources/js/app.tsx'],
			refresh: true,
		}),
		react({
            babel: {
                plugins: ['babel-plugin-react-compiler'],
            },
        }),
        tailwindcss(),
	],
    resolve: {
		alias: {
			'~': path.resolve(__dirname, 'resources/js'),
		},
	},
	server: {
		host: '0.0.0.0',
		port: 5173,
		strictPort: true,
		hmr: {
			host: 'localhost',
		},
	},
});
