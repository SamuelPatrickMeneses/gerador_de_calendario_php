/** @type {import('tailwindcss').Config} */
module.exports = {
  content: ['./src/**/*.php','./src/meta_css/tailwind.css'],
  theme: {
    extend: {
      colors:{
        lightsalmon:'#FFA07A', /* Light Salmon */
        darkorange:'#FF8C00', /* Dark Orange */
        coral:'#FF7F50', /* Coral */
        tomato:'#FF6347', /* Tomato */
        orangered:'#FF4500', /* Orange Red */
        lightblue:'#ADD8E6', /* Light Blue */
        skyblue:'#87CEEB', /* Sky Blue */
        deepskyblue:'#00BFFF', /* Deep Sky Blue */
        dodgerblue:'#1E90FF', /* Dodger Blue */
        royalblue:'#4169E1', /* Royal Blue */

   
      }
    },
    
  },
  plugins: [],
}
