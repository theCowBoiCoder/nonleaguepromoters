module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            colors:{
                orange: {
                    DEFAULT: '#ffa500'
                }
            },
            backgroundImage: theme => ({
                'home-image' : "url('/images/home_background.jpg')",
                'about-image' : "url('/images/about.png')",
                'player-image' : "url('/images/player.png')",
                'mobile-image' : "url('/images/mobile_image.jpg')"
            }),
            fontFamily:{
              'Roboto':['Roboto','sans-serif'],
            },
            screens: {
                'tablet': '640px',
                // => @media (min-width: 640px) { ... }

                'laptop': '1024px',
                // => @media (min-width: 1024px) { ... }

                'desktop': '1920',
                // => @media (min-width: 1280px) { ... }
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
