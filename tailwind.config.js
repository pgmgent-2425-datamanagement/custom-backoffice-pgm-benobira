/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./**/*.php",
    "./src/**/*.html",
  ],
  theme: {
    extend: {
      fontFamily: {
        poppins: ['Poppins', 'sans-serif'],
      },
      colors: {
        primary: '#4F46E5', // Indigo as the main color
        lightPrimary: '#6366f1', // Light indigo
      },
    },
  },
  plugins: [],
}
