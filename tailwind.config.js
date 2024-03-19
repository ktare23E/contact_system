/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./*.{html,js,php}", // Targets files in the project root
    "./src/**/*.{html,js,php}", // Targets files in the src directory and any subdirectories
    //I want to use tailwind in users directory
    "./users/**/*.{html,js,php}",
  ],
  theme: {
    extend: {},
  },
  plugins: [],
}
