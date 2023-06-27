/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    './resources/**/*.{blade.php,js,vue}',
  ],
  theme: {
    extend: {
      colors: {
        laravel: "#ef3b2d",
      },
    },
  },
  plugins: [],
}

