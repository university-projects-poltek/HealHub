export default {
  content: [
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
    "./node_modules/flowbite/**/*.js"
  ],
  theme: {
    extend: {
      colors: {
        'primary': '',
        'secondary': '#A0A0A0',
        'healhub-black': '#131313',
        'healhub-darkwhite': '#121212',
        'healhub-grey': '#A0A0A0',
        'healhub-light-blue': '#83A7FF ',
        'healhub-blue': '#2D68F8 ',
        'healhub-light-grey': '#D0D0D0',
        'healhub-dark-grey': '#414141',
        'healhub-darker-grey': '#1E1E1E',
        'healhub-bg-white': '#F6F7F9',
        'healhub-white': '#F6F7F9',
        'healhub-white02': '#F6F7F9',
        'healhub-lightblue': '#C3D4E9',

      },
      backgroundImage: () => ({
        'custom-gradient': 'linear-gradient(to right, #d946ef, #fcd34d)',
      }),
      keyframes: {
        slide: {
          "0%": { transform: "translateX(0%)" },
          "100%": { transform: "translateX(-100%)" },
        },
        slideToR: {
          "0%": { transform: "translateX(-100%)" },
          "100%": { transform: "translateX(0%)" },
        },
        slideToT: {
          "0%": { transform: "translateY(0%)" },
          "100%": { transform: "translateY(-100%)" },
        },
        slideToB: {
          "0%": { transform: "translateY(-100%)" },
          "100%": { transform: "translateY(0%)" },
        },
      },
    },
  },

  plugins: [
      require('flowbite/plugin')
  ],
}

