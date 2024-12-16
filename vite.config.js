export default defineConfig({
    plugins: [
      laravel({
        input: [
          'resources/sass/app.scss',
          'resources/js/app.js',
        ],
        refresh: true,
      }),
    ],
    build: {
      outDir: 'public/build',  // Vérifiez que ce paramètre est bien défini
      manifest: true,          // Assurez-vous que le manifeste est généré
    }
  });
