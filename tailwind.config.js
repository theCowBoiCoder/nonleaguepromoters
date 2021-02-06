module.exports = {
    purge: [
        './resources/**/*.blade.php',
        './resources/**/*.js',
        './resources/**/*.vue',
    ],
    darkMode: false, // or 'media' or 'class'
    theme: {
        extend: {
            backgroundImage: theme => ({
                'home-image' : "url('/images/home_background.jpg')",
            }),
            fontFamily:{
              'Montserrat':['Montserrat','sans-serif'],
              'Ubuntu':['Ubuntu','sans-serif']
            },
            screens: {
                'tablet': '640px',
                // => @media (min-width: 640px) { ... }

                'laptop': '1024px',
                // => @media (min-width: 1024px) { ... }

                'desktop': '1280px',
                // => @media (min-width: 1280px) { ... }
            },
        },
    },
    variants: {
        extend: {},
    },
    plugins: [],
}
