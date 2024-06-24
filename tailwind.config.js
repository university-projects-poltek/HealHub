export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'primary': '',
        'secondary': '#A0A0A0',

      },
      backgroundImage: () => ({
        'custom-gradient': 'linear-gradient(to right, #d946ef, #fcd34d)',
      }),
    },
  },
  plugins: [
      require('flowbite/plugin')
  ],
}

