/** @type {import('tailwindcss').Config} */
export default {
  content: [
    "./node_modules/flowbite/**/*.js",
    "./resources/**/*.blade.php",
    "./resources/**/*.js",
    "./resources/**/*.vue",
  ],
  safelist: [
    {
        pattern: /bg-+/,
    }
  ],
  theme: {
    extend: {},
  },
plugins: [
    require('flowbite/plugin')
  ],
}
