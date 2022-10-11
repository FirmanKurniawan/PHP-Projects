module.exports = {
  purge: [
    './resources/**/*.js',
    './resources/**/*.vue',
  ],
  darkMode: false, // or 'media' or 'class'
  theme: {
    extend: {
      height : {
        '100' : '28rem'
      },
      backgroundColor: theme => ({
        'overlay' : 'rgba(0, 0, 0, 0.6)'
      })
    },
  },
  variants: {
    extend: {
      cursor: ['hover', 'focus'],
      backgroundColor: ['active'],
    },
  },
  plugins: [],
}
