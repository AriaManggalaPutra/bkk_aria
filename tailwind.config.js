module.exports = {
  content: [
    './resources/views/**/*.blade.php',
    './resources/js/**/*.js',
    './node_modules/flowbite/**/*.js'
  ],
  theme: {
    extend: {
      backgroundImage: {
        'hero-image': "url('/assets/background.png')",
      },
    },
  },
  plugins: [
    require('flowbite/plugin')({
      charts: true,
      datatables: true,
    }),
  ]
}
