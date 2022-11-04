//const autoprefixer = require('autoprefixer');
const colors = require('tailwindcss/colors');

/** @type {import('tailwindcss').Config} */
module.exports = {
  content: [
    "./assets/**/*.js",
    "./templates/**/*.html.twig",
    "./assets/**/*.vue",
  ],
  darkMode: false, // or 'media' or 'class'
	theme: {
		minHeight: {
       		'64': '16rem',
			'96': '24rem',
			'40': '10rem',
		},
		maxHeight: {
			'500': '500px',
			'3/4': '75%',
			'96' : '24rem',
			'36' : '9rem'
	 	},
		boxShadow: {
			'3xl': '5px 5px 12px 5px rgba(0, 0, 0, 30%)', // ex: class="shadow-3xl"
			// DEFAULT SHADOWS - DO NOT REMOVE them except if you're removing the one above
			sm: '0 1px 2px 0 rgba(0, 0, 0, 0.05)',
			DEFAULT: '0 1px 3px 0 rgba(0, 0, 0, 0.1), 0 1px 2px 0 rgba(0, 0, 0, 0.06)',
			md: '0 4px 6px -1px rgba(0, 0, 0, 0.1), 0 2px 4px -1px rgba(0, 0, 0, 0.06)',
			lg: '0 10px 15px -3px rgba(0, 0, 0, 0.1), 0 4px 6px -2px rgba(0, 0, 0, 0.05)',
			xl: '0 20px 25px -5px rgba(0, 0, 0, 0.1), 0 10px 10px -5px rgba(0, 0, 0, 0.04)',
			'2xl': '0 25px 50px -12px rgba(0, 0, 0, 0.25)',
		   inner: 'inset 0 2px 4px 0 rgba(0, 0, 0, 0.06)',
		   none: 'none',
		  },
		fontFamily: {
			'montserrat': ['Montserrat'], // ex: class="font-montserrat"
			'nunito': ['Nunito'],
			'roboto': ['Roboto'],
		},
		colors: {
			transparent: 'transparent',
			current: 'currentColor',
			black: colors.black,
			white: colors.white,
			blue: colors.blue,
			orange: colors.orange,
			pink: colors.pink,
			purple: colors.purple,
			cyan: colors.cyan,
			gray: colors.gray,
			red: colors.red,
			green: colors.green,
			orange: colors.orange,
			yellow: colors.amber,
			'lightBlueInstagram': '#eff8ff',
			'facebook': '#3b5998',
			'google': '#4285F4',
			tualuBlue: {
			DEFAULT: '#1e83a3', // ex : class="text-tualuBlue"
			soft: '#ddedf1', // ex: class="bg-tualuBlue-soft"
			softActive: '#b2d4d9',
			hover: '#17657d',
			active: '#0d4151',
			},
			tualuCoral: {
			DEFAULT: '#ff6f61',
			soft: '#fff2ee',
			softer: '#ffa59c',
			hover: '#c73f32',
			active: '#972015',
			},
			tualuGray: {
			DEFAULT: '#6d7882',
			hover: '#46515a',
			active: '#202f3d',
			text: '#324b50',
			coral: '#908181',
			blue: '#79848e',
			border: '#b4bac0',
			},
			tualuGreen: {
			DEFAULT: '#2b8828',
			hover: '#1e6e1c',
			active: '#0d4e0b',
			},
			tualuRed: {
			DEFAULT: '#ee0000',
			hover: '#c20000',
			active: '#4b0101',
			},
		},
		fontSize: {
			'3xs': '.6rem',
			'2xs': '.675rem',
			'xs': '.75rem',
			'sm': '.875rem',
			'base': '1rem',
			'lg': '1.125rem',
			'xl': '1.25rem',
			'2xl': '1.5rem',
			'3xl': '1.875rem',
			'4xl': '2.25rem',
			'5xl': '3rem',
			'6xl': '4rem',
			'7xl': '5rem',
		},
		extend: {
			backgroundImage: theme => ({
				 'swirls-header': "url('/public/images/background/swirls-header.png')", // ex : class="bg-swirls-header"
				 'swirls-footer': "url('/public/images/background/swirls-footer.png')",
				 'swirls-bookShowcase' : "url('/public/images/background/swirls-bookShowcase.png')",
			}),
			spacing: {
				'500': '500px',
				'300': '300px',
			},
			margin: {
				'15': '3.70rem',
			},
			maxHeight: {
				'3/4': '75vh',
			}
		},
	},
	variants: {
		extend: {
			opacity: ['disabled'],
			cursor: ['disabled'],
			fontFamily: ['hover', 'focus', 'active'],
			fill: ['hover', 'focus', 'active'],
			textColor: ['hover', 'active', 'last', 'first'], // ex: class="hover:text-tualuBlue"
			borderColor: ['hover', 'focus', 'last', 'first'],
			borderWidth: ['hover', 'focus', 'group-hover'],
			margin: ['hover', 'focus'],
			animation: ['hover', 'focus', 'group-hover'],
			fontStyle: ['hover', 'focus'],
			fontWeight: ['hover', 'focus'],
			backgroundColor: ['checked', 'disabled'],
			textColor: ['disabled'],
			ringColor: ['checked'],
			ringWidth: ['checked'],
			translate: ['active', 'group-hover'],
			visibility: ['group-hover', 'hover'],
			scale: ['group-hover'],
			filter: ['hover', 'group-hover'],
			letterSpacing: ['hover'],
		}
	},
  plugins: [],
}